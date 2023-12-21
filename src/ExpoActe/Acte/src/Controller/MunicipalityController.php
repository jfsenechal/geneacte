<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Entity\Geoloc;
use ExpoActe\Acte\Repository\GeolocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/municipality')]
class MunicipalityController extends AbstractController
{
    public function __construct(
        private readonly GeolocationRepository $geolocationRepository
    ) {
    }

    #[Route(path: '/{letter}', name: 'expoacte_municipality_index')]
    public function index(string $letter = null): Response
    {
        $alphabets = $this->geolocationRepository->alphabetMunicipalities();

        if ($letter) {
            $municipalities = $this->geolocationRepository->findMunicipalitiesByFirstLetter($letter);
        } else {
            $municipalities = $this->geolocationRepository->findAllMunicipalities();
        }

        dd($alphabets);

        return $this->render(
            '@ExpoActe/municipality/index.html.twig',
            [
                'alphabets' => $alphabets,
                'municipalities' => $municipalities,
            ]
        );
    }

    #[Route('/{uuid}/edit', name: 'expoacte_municipality_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Geoloc $geoloc): Response
    {
        $form = $this->createForm(GeolocType::class, $geoloc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->geolocationRepository->flush();

            $this->addFlash('success', 'La commune a été modifiée');

            return $this->redirectToRoute('expoacte_user_show', ['uuid' => $geoloc->id]);
        }

        return $this->render('@ExpoActe/geoloc/edit.html.twig', [
            'geoloc' => $geoloc,
            'form' => $form,
        ]);
    }
}