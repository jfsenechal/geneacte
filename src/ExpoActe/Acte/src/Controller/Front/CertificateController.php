<?php

namespace ExpoActe\Acte\Controller\Front;

use Doctrine\ORM\EntityManagerInterface;
use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Entity\Summary;
use ExpoActe\Acte\Repository\GeolocationRepository;
use ExpoActe\Acte\Repository\SummaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/certificate')]
class CertificateController extends AbstractController
{
    public function __construct(
        private readonly SummaryRepository $summaryRepository,
        private readonly GeolocationRepository $geolocationRepository,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/index/{type}', name: 'expoacte_certificate_index', methods: ['GET'])]
    public function index(string $type = null): Response
    {
        $data = [];
        $certificateType = CertificateTypeEnum::tryFrom($type);

        $menu = $this->summaryRepository->certificateMenu();
        $letters = $this->summaryRepository->alphabetCertificateType();
        if ($certificateType) {
            $data = $this->summaryRepository->findCertificatesByType($certificateType->value);
        }

        return $this->render('@ExpoActe/front/certificate/index.html.twig', [
            'certificateType' => $certificateType,
            'menu' => $menu,
            'letters' => $letters,
            'data' => $data,
        ]);
    }

    #[Route('/browse/{id}', name: 'expoacte_certificate_browse', methods: ['GET'])]
    public function browse(Summary $summary): Response
    {
        $certificateType = CertificateTypeEnum::tryFrom($summary->typact);
        $geolocation = $this->geolocationRepository->findOneByDepartmentAndMunicipality(
            $summary->depart,
            $summary->commune
        );

        $repository = $this->entityManager->getRepository($certificateType->getClassName());
        $data = $repository->findSurnameByDepartmentAndMunicipality($summary->depart, $summary->commune);

        return $this->render('@ExpoActe/front/certificate/browse.html.twig', [
            'certificateType' => $certificateType,
            'summary' => $summary,
            'geolocation' => $geolocation,
            'data' => $data,
        ]);
    }

    #[Route('/letter/{id}/{letter}', name: 'expoacte_certificate_browse_letter', methods: ['GET'])]
    public function letter(Summary $summary, string $letter = null): Response
    {
        $certificateType = CertificateTypeEnum::tryFrom($summary->typact);
        $geolocation = $this->geolocationRepository->findOneByDepartmentAndMunicipality(
            $summary->depart,
            $summary->commune
        );

        $repository = $this->entityManager->getRepository($certificateType->getClassName());
        $data = $repository->findSurnameByDepartmentAndMunicipalityAndLetter(
            $summary->depart,
            $summary->commune,
            $letter
        );

        return $this->render('@ExpoActe/front/certificate/letter.html.twig', [
            'certificateType' => $certificateType,
            'summary' => $summary,
            'geolocation' => $geolocation,
            'data' => $data,
        ]);
    }

}
