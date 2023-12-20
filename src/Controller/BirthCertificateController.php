<?php

namespace App\Controller;

use App\Certificate\CertificateEnum;
use App\Entity\ActNai3;
use App\Form\BirthCertificateType;
use App\Repository\BirthRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/certificate/birth')]
#[AsController]
class BirthCertificateController extends AbstractController
{
    public function __construct(private readonly BirthRepository $birthRepository)
    {
    }

    #[Route('/', name: 'expoacte_certificate_birth_index', methods: ['GET'])]
    public function index(): Response
    {
        $certificates = $this->birthRepository->findAllOrdered();

        return $this->render('@ExpoActe/certificate/index.html.twig', [
            'certificates' => $certificates,
        ]);
    }

    #[Route('/new', name: 'expoacte_certificate_birth_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $certificate = new ActNai3();
        $certificate->typact = CertificateEnum::BIRTH->value;
        $form = $this->createForm(BirthCertificateType::class, $certificate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->birthRepository->persist($certificate);
            $this->birthRepository->flush();
            $this->addFlash('success', 'L\'acte a été ajouté');

            return $this->redirectToRoute('expoacte_certificate_birth_show', ['uuid' => $certificate->uuid]);
        }

        return $this->render('@ExpoActe/certificate/new.html.twig', [
            'certificate' => $certificate,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'expoacte_certificate_birth_show', methods: ['GET'])]
    public function show(ActNai3 $certificate): Response
    {
        return $this->render('@ExpoActe/certificate/show.html.twig', [
            'certificate' => $certificate,
        ]);
    }

    #[Route('/{uuid}/edit', name: 'expoacte_certificate_birth_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ActNai3 $certificate): Response
    {
        $form = $this->createForm(BirthCertificateType::class, $certificate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->birthRepository->flush();

            $this->addFlash('success', 'L\'acte a été modifié');

            return $this->redirectToRoute('expoacte_certificate_birth_show', ['uuid' => $certificate->uuid]);
        }

        return $this->render('@ExpoActe/certificate/edit.html.twig', [
            'certificate' => $certificate,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'expoacte_certificate_birth_delete', methods: ['POST'])]
    public function delete(Request $request, ActNai3 $certificate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$certificate->uuid, $request->request->get('_token'))) {
            $this->birthRepository->remove($certificate);
            $this->birthRepository->flush();
            $this->addFlash('success', 'L\acte a été supprimé');
        }

        return $this->redirectToRoute('expoacte_certificate_birth_index', []);
    }
}
