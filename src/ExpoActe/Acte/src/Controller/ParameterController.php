<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Entity\Param;
use ExpoActe\Acte\Parameter\Form\ParamType;
use ExpoActe\Acte\Repository\ParameterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/parameter')]
class ParameterController extends AbstractController
{
    public function __construct(private readonly ParameterRepository $parameterRepository)
    {
    }

    #[Route('/', name: 'expoacte_parameter_index', methods: ['GET'])]
    public function index(): Response
    {
        $parameters = $this->parameterRepository->findAllOrdered();
        $groupedParameters = [];
        foreach ($parameters as $parameter) {
            $groupedParameters[$parameter->groupe][] = $parameter;
        }

        ksort($groupedParameters);

        return $this->render('@ExpoActe/parameter/index.html.twig', [
            'groupedParameters' => $groupedParameters,
        ]);
    }

    #[Route('/new', name: 'expoacte_parameter_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $parameter = new Param();
        $form = $this->createForm(ParamType::class, $parameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->parameterRepository->persist($parameter);
            $this->parameterRepository->flush();
            $this->addFlash('success', 'Le paramètre a été ajouté');

            return $this->redirectToRoute('expoacte_parameter_index', []);
        }

        return $this->render('@ExpoActe/parameter/new.html.twig', [
            'act_param' => $parameter,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'expoacte_parameter_show', methods: ['GET'])]
    public function show(Param $parameter): Response
    {
        return $this->render('@ExpoActe/parameter/show.html.twig', [
            'act_param' => $parameter,
        ]);
    }

    #[Route('/{uuid}/edit', name: 'expoacte_parameter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Param $parameter): Response
    {
        $form = $this->createForm(ParamType::class, $parameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->parameterRepository->flush();

            $this->addFlash('success', 'Le paramètre a été modifié');

            return $this->redirectToRoute('expoacte_parameter_index', []);
        }

        return $this->render('@ExpoActe/parameter/edit.html.twig', [
            'act_param' => $parameter,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'expoacte_parameter_delete', methods: ['POST'])]
    public function delete(Request $request, Param $parameter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parameter->uuid, $request->request->get('_token'))) {
            $this->parameterRepository->remove($parameter);
            $this->parameterRepository->flush();
            $this->addFlash('success', 'Le paramètre a été supprimé');
        }

        return $this->redirectToRoute('expoacte_parameter_index', []);
    }
}
