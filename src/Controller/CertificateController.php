<?php

namespace App\Controller;

use App\Certificate\CertificateEnum;
use App\Certificate\Factory\CertificateFactory;
use App\Certificate\Form\BirthCertificateType;
use App\Certificate\Form\CertificateNewType;
use App\Entity\ActNai3;
use App\Repository\ActSumRepository;
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
        private readonly ActSumRepository $actSumRepository,
        private readonly CertificateFactory $certificateFactory,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route(path: '/', name: 'expoacte_certificate_index')]
    public function index(string $table = 'N'): Response
    {
        $municipalities = $this->actSumRepository->findMunicipalitiesByTable($table);
        $typesCertficate = CertificateEnum::cases();
        $otherCertificateLabels = $this->actSumRepository->findLabelsForOtherCertificates();

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
        $municipalities = $this->actSumRepository->findMunicipalitiesByTable($type);
        $form = $this->createForm(CertificateNewType::class, null);

        return $this->render('@ExpoActe/certificate/select_municipality.html.twig', [
            'municipalities' => $municipalities,
            'certificateType' => CertificateEnum::from($type),
            'form' => $form,
        ]);
    }

    #[Route('/new/{type}', name: 'expoacte_certificate_certificate_new', methods: ['GET', 'POST'])]
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
        ]);
    }

    #[Route('/{uuid}/show', name: 'expoacte_certificate_show', methods: ['GET', 'POST'])]
    public function show(Request $request, ActNai3 $certificate): Response
    {

    }

    #[Route('/{uuid}/edit', name: 'expoacte_certificate_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ActNai3 $certificate): Response
    {
        $form = $this->createForm(BirthCertificateType::class, $certificate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            $this->addFlash('success', 'L\'acte a été modifié');

            return $this->redirectToRoute('expoacte_certificate_show', ['uuid' => $certificate->uuid]);
        }

        return $this->render('@ExpoActe/certificate/edit.html.twig', [
            'certificate' => $certificate,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'expoacte_certificate_delete', methods: ['POST'])]
    public function delete(Request $request, ActNai3 $certificate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$certificate->uuid, $request->request->get('_token'))) {
            $this->entityManager->remove($certificate);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\acte a été supprimé');
        }

        return $this->redirectToRoute('expoacte_certificate_index', []);
    }
}