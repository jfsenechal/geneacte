<?php

namespace ExpoActe\Acte\Controller\Front;

use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Entity\Summary;
use ExpoActe\Acte\Repository\SummaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/certificate')]
class CertificateController extends AbstractController
{
    public function __construct(
        private readonly SummaryRepository $summaryRepository,
    ) {
    }

    #[Route('/{type}/{letter}', name: 'expoacte_certificate_index', methods: ['GET'])]
    public function index( string $type = null, string $letter = null): Response
    {
        $data = [];
        $certificateType = null;
        if ($type) {
            try {
                $certificateType = CertificateTypeEnum::from($type);
            } catch (\Exception $exception) {
                $this->addFlash('danger', 'Type inconnu');

                return $this->redirectToRoute('expoacte_certificate_index');
            }
        }

        $menu = $this->summaryRepository->certificateMenu();
        $letters = $this->summaryRepository->alphabetCertificateType();
        if ($certificateType) {
            $data = $this->summaryRepository->findCertificatesByType($certificateType->value, $letter);
        }

        return $this->render('@ExpoActe/front/certificate/index.html.twig', [
            'certificateType' => $certificateType,
            'menu' => $menu,
            'letters' => $letters,
            'data' => $data,
        ]);
    }

    #[Route('/browse/{id}', name: 'expoacte_certificate_browse', methods: ['GET'])]
    public function show(Summary $summary): Response
    {
        $data = [];
        $certificateType = null;


        $menu = $this->summaryRepository->certificateMenu();
        $letters = $this->summaryRepository->alphabetCertificateType();
        if ($certificateType) {
            $data = $this->summaryRepository->findCertificatesByType($certificateType->value, $letter);
        }

        return $this->render('@ExpoActe/front/certificate/index.html.twig', [
            'certificateType' => $certificateType,
            'menu' => $menu,
            'letters' => $letters,
            'data' => $data,
        ]);
    }

}
