<?php

namespace ExpoActe\Acte\Controller;

use Doctrine\ORM\EntityManagerInterface;
use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Certificate\Factory\CertificateFactory;
use ExpoActe\Acte\Certificate\Form\CertificateNewType;
use ExpoActe\Acte\Certificate\Form\CertificateType;
use ExpoActe\Acte\Certificate\Handler\CertificateHandler;
use ExpoActe\Acte\Certificate\Message\CertificateCreated;
use ExpoActe\Acte\Certificate\Message\CertificateDeleted;
use ExpoActe\Acte\Certificate\Message\CertificateUpdated;
use ExpoActe\Acte\Repository\SummaryRepository;
use ExpoActe\Acte\User\Form\UserSearchType;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/certificate')]
class CertificateController extends AbstractController
{
    public function __construct(
        private readonly SummaryRepository $summaryRepository,
        private readonly CertificateFactory $certificateFactory,
        private readonly CertificateHandler $certificateHandler,
        private readonly EntityManagerInterface $entityManager,
        private readonly MessageBusInterface $bus
    ) {
    }

    #[Route('/', name: 'expoacte_certificate_index', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $form = $this->createForm(UserSearchType::class);
        $form->handleRequest($request);
        $types = CertificateTypeEnum::cases();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $users = $this->userRepository->findByName($data['name']);
        }

        $response = new Response(null, $form->isSubmitted() ? Response::HTTP_ACCEPTED : 200);

        return $this->render('@ExpoActe/certificate/index.html.twig', [
            'certificateTypes' => $types,
            'form' => $form,
            'isSearch' => $form->isSubmitted(),
        ], $response);
    }

    #[Route('/select/type', name: 'expoacte_certificat_select_type', methods: ['GET', 'POST'])]
    public function selectType(): Response
    {
        return $this->render('@ExpoActe/certificate/select_type.html.twig', [
            'types' => CertificateTypeEnum::getTypes(),
        ]);
    }

    #[Route('/select/municipality/{type}', name: 'expoacte_certificate_select_municipality', methods: [
        'GET',
        'POST',
    ])]
    public function selectMunicipality(string $type): Response
    {
        $municipalities = $this->summaryRepository->findMunicipalitiesByTable($type);
        $form = $this->createForm(CertificateNewType::class, null);

        return $this->render('@ExpoActe/certificate/select_municipality.html.twig', [
            'municipalities' => $municipalities,
            'certificateType' => CertificateTypeEnum::from($type),
            'form' => $form,
        ]);
    }

    #[Route('/new/{type}', name: 'expoacte_certificate_new', methods: ['GET', 'POST'])]
    public function new(Request $request, string $type): Response
    {
        try {
            $factory = $this->certificateFactory->getFactory($type);
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            $this->addFlash('danger', 'Ce type d\'acte n\'est pas supporté');

            return $this->redirectToRoute('expoacte_home');
        }

        $certificate = $factory->newInstance();

        $form = $this->createForm(CertificateType::class, $certificate);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($certificate);
            $this->entityManager->persist($certificate);
            $this->entityManager->flush();

            $this->bus->dispatch(new CertificateCreated($certificate->id));

            return $this->redirectToRoute('expoacte_certificate_show', [
                'uuid' => $certificate->uuid,
            ]);
        }

        $labelGroups = $this->certificateHandler->groupFieldsForForm($form, $type);

        $response = new Response(null, $form->isSubmitted() ? Response::HTTP_UNPROCESSABLE_ENTITY : 200);

        return $this->render('@ExpoActe/certificate/new.html.twig', [
            'form' => $form,
            'labelGroups' => $labelGroups,
            'certificateType' => CertificateTypeEnum::from($type),
        ], $response);
    }

    #[Route('/{uuid}/show', name: 'expoacte_certificate_show', methods: ['GET', 'POST'])]
    public function show(
        #[MapEntity(objectManager: 'foo')]
        object $certificate
    ): Response {
        return $this->render('@ExpoActe/certificate/show.html.twig', [
            'certificate' => $certificate,
        ]);
    }

    #[Route('/{uuid}/edit', name: 'expoacte_certificate_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, object $certificate): Response
    {
        try {
            $this->certificateFactory->getFactory($certificate->type);
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            $this->addFlash('danger', 'Ce type d\'acte n\'est pas supporté');

            return $this->redirectToRoute('expoacte_home');
        }

        $form = $this->createForm(CertificateType::class, $certificate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            $this->bus->dispatch(new CertificateUpdated($certificate->id));

            return $this->redirectToRoute('expoacte_certificate_show', [
                'uuid' => $certificate->uuid,
            ]);
        }

        $labelGroups = $this->certificateHandler->groupFieldsForForm($form, $type);

        return $this->render('@ExpoActe/certificate/edit.html.twig', [
            'certificate' => $certificate,
            'form' => $form,
            'labelGroups' => $labelGroups,
            'certificateType' => CertificateTypeEnum::from($certificate->type)->getLabel(),
        ]);
    }

    #[Route('/{uuid}', name: 'expoacte_certificate_delete', methods: ['POST'])]
    public function delete(Request $request, object $certificate): Response
    {
        if ($this->isCsrfTokenValid('delete' . $certificate->uuid, $request->request->get('_token'))) {
            $this->entityManager->remove($certificate);
            $this->entityManager->flush();

            $this->bus->dispatch(new CertificateDeleted($certificate->id));
        }

        return $this->redirectToRoute('expoacte_certificate_index', []);
    }
}
