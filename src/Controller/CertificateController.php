<?php

namespace App\Controller;

use App\Certificate\CertificateEnum;
use App\Certificate\CertificateFactory;
use App\Entity\ActNai3;
use App\Form\BirthCertificateType;
use App\Form\CertificateNewType;
use App\Repository\ActSumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/certificates')]
class CertificateController extends AbstractController
{
    public function __construct(private readonly ActSumRepository $actSumRepository)
    {
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
                'types'=>$typesCertficate,
                'others'=>$otherCertificateLabels
            ]
        );
    }

    #[Route('/new', name: 'geneacte_certificate_certificate_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $certificate = CertificateFactory::createBirth();
        $form = $this->createForm(CertificateNewType::class, null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->birthRepository->persist($certificate);
            $this->birthRepository->flush();
            $this->addFlash('success', 'L\'acte a été ajouté');

            return $this->redirectToRoute('geneacte_certificate_birth_show', ['uuid' => $certificate->uuid]);
        }

        return $this->render('@ExpoActe/certificate/new.html.twig', [
            'certificate' => $certificate,
            'form' => $form,
        ]);
    }


}