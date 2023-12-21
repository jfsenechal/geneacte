<?php

namespace App\Controller;

use App\Certificate\CertificateEnum;
use App\Certificate\Factory\CertificateFactory;
use App\Certificate\Form\CertificateNewType;
use App\Repository\SummaryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/certificates')]
class CertificateController extends AbstractController
{
    public function __construct(
        private readonly SummaryRepository $summaryRepository,
        private readonly CertificateFactory $certificateFactory,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route(path: '/', name: 'expoacte_certificate_index')]
    public function index(string $table = 'N'): Response
    {
        $municipalities = $this->summaryRepository->findMunicipalitiesByTable($table);
        $typesCertficate = CertificateEnum::cases();
        $otherCertificateLabels = $this->summaryRepository->findLabelsForOtherCertificates();

        return $this->render(
            '@ExpoActe/certificate/titi.html.twig',
            [
                'certificates' => [],
                'municipalities' => $municipalities,
                'types' => $typesCertficate,
                'others' => $otherCertificateLabels,
            ]
        );
    }

    #[Route('/select/type', name: 'expoacte_certificat_select_type', methods: ['GET', 'POST'])]
    public function selectType(): Response
    {
        return $this->render('@ExpoActe/certificate/select_type.html.twig', [
            'types' => CertificateEnum::getTypes(),
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
            'certificateType' => CertificateEnum::from($type),
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
        $form = $factory->generateForm($certificate);
        $formHtml = $factory->renderForm($form);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($certificate);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'acte a été ajouté');

            return $this->redirectToRoute('expoacte_certificate_show', ['uuid' => $certificate->uuid]);
        }

        return $this->render('@ExpoActe/certificate/new.html.twig', [
            'formHtml' => $formHtml,
            'name' => CertificateEnum::from($type)->getLabel(),
        ]);
    }

    #[Route('/{uuid}/show', name: 'expoacte_certificate_show', methods: ['GET', 'POST'])]
    public function show(object $certificate): Response
    {
        return $this->render('@ExpoActe/certificate/show.html.twig', [
            'certificate' => $certificate,
        ]);
    }

    #[Route('/{uuid}/edit', name: 'expoacte_certificate_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, object $certificate): Response
    {
        try {
            $factory = $this->certificateFactory->getFactory($certificate->type);
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            $this->addFlash('danger', 'Ce type d\'acte n\'est pas supporté');

            return $this->redirectToRoute('expoacte_home');
        }

        $form = $factory->generateForm($certificate);
        $formHtml = $factory->renderForm($form);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'acte a été modifié');

            return $this->redirectToRoute('expoacte_certificate_show', ['uuid' => $certificate->uuid]);
        }

        return $this->render('@ExpoActe/certificate/edit.html.twig', [
            'certificate' => $certificate,
            'formHtml' => $formHtml,
            'name' => CertificateEnum::from($certificate->type)->getLabel(),
        ]);
    }

    #[Route('/{uuid}', name: 'expoacte_certificate_delete', methods: ['POST'])]
    public function delete(Request $request, object $certificate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$certificate->uuid, $request->request->get('_token'))) {
            $this->entityManager->remove($certificate);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\acte a été supprimé');
        }

        return $this->redirectToRoute('expoacte_certificate_index', []);
    }
}