<?php

namespace App\Controller;

use App\Certificate\CertificateEnum;
use App\Certificate\CertificateFactory;
use App\Form\CertificateNewType;
use App\Repository\ActSumRepository;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/certificates')]
class CertificateController extends AbstractController
{
    public function __construct(
        private readonly ActSumRepository $actSumRepository,
        private readonly CertificateFactory $certificateFactory
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

    #[Route('/select/type', name: 'expoacte_certificate_certificate_select_type', methods: ['GET', 'POST'])]
    public function selectType(): Response
    {
        return $this->render('@ExpoActe/certificate/select_type.html.twig', [
            'types' => CertificateEnum::getTypes(),
        ]);
    }

    #[Route('/select/municipality/{type}', name: 'expoacte_certificate_certificate_select_municipality', methods: [
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
            $this->birthRepository->persist($certificate);
            $this->birthRepository->flush();
            $this->addFlash('success', 'L\'acte a été ajouté');

            return $this->redirectToRoute('expoacte_certificate_birth_show', ['uuid' => $certificate->uuid]);
        }

        return $this->render('@ExpoActe/certificate/new.html.twig', [
            'formHtml' => $formHtml,
        ]);
    }

}