<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Entity\Geolocation;
use ExpoActe\Acte\Geolocation\Form\GeolocationType;
use ExpoActe\Acte\Repository\GeolocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/geolocation')]
class GeolocationController extends AbstractController
{
    public function __construct(
        private readonly GeolocationRepository $geolocationRepository
    ) {
    }

    #[Route(path: '/{letter}', name: 'expoacte_geolocation_index')]
    public function index(string $letter = null): Response
    {
        $alphabets = $this->geolocationRepository->alphabetMunicipalities();

        if ($letter) {
            $geolocations = $this->geolocationRepository->findMunicipalitiesByFirstLetter($letter);
        } else {
            $geolocations = $this->geolocationRepository->findAllMunicipalities();
        }

        return $this->render(
            '@ExpoActe/geolocation/index.html.twig',
            [
                'alphabets' => $alphabets,
                'geolocations' => $geolocations,
            ]
        );
    }

    #[Route('/{id}/show', name: 'expoacte_geolocation_show', methods: ['GET', 'POST'])]
    public function show(Geolocation $geolocation): Response
    {
        return $this->render('@ExpoActe/geolocation/show.html.twig', [
            'geolocation' => $geolocation,
        ]);
    }

    #[Route('/{id}/edit', name: 'expoacte_geolocation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Geolocation $geolocation): Response
    {
        $form = $this->createForm(GeolocationType::class, $geolocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->geolocationRepository->flush();

            $this->addFlash('success', 'La commune a été modifiée');

            return $this->redirectToRoute('expoacte_geolocation_show', ['id' => $geolocation->id]);
        }

        return $this->render('@ExpoActe/geolocation/edit.html.twig', [
            'geolocation' => $geolocation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'expoacte_geolocation_delete', methods: ['POST'])]
    public function delete(Request $request, Geolocation $geolocation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$geolocation->id, $request->request->get('_token'))) {
            $this->geolocationRepository->remove($geolocation);
            $this->geolocationRepository->flush();
            $this->addFlash('success', 'La commune a été supprimée');
        }

        return $this->redirectToRoute('expoacte_user_index', []);
    }
}