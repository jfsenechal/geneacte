<?php

namespace App\Controller;

use App\Certificate\CertificateEnum;
use App\Certificate\CertificateFactory;
use App\Form\CertificateNewType;
use App\Repository\ActSumRepository;
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

    #[Route(path: '/', name: 'geneacte_certificate_home')]
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

    #[Route('/select/type', name: 'geneacte_certificate_certificate_select_type', methods: ['GET', 'POST'])]
    public function selectType(): Response
    {
        return $this->render('@ExpoActe/certificate/select_type.html.twig', [
            'types' => CertificateEnum::getTypes(),
        ]);
    }

    #[Route('/select/municipality/{type}', name: 'geneacte_certificate_certificate_select_municipality', methods: [
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

    #[Route('/new/{type}', name: 'geneacte_certificate_certificate_new', methods: ['GET', 'POST'])]
    public function new(Request $request, string $type): Response
    {
        $factory = $this->certificateFactory->getFactory($type);
        $certificate = $factory->newInstance();
        $form = $factory->generateForm($certificate);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->birthRepository->persist($certificate);
            $this->birthRepository->flush();
            $this->addFlash('success', 'L\'acte a été ajouté');

            return $this->redirectToRoute('geneacte_certificate_birth_show', ['uuid' => $certificate->uuid]);
        }

        return $this->render('@ExpoActe/certificate/new.html.twig', [
            'types' => CertificateEnum::getTypes(),
            'form' => $form,
        ]);
    }


}