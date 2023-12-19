<?php

namespace App\Controller;

use App\Entity\ActParams;
use App\Form\ActParamsType;
use App\Repository\ParameterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/parameter')]
#[AsController]
class ParameterController extends AbstractController
{
    public function __construct(private readonly ParameterRepository $parameterRepository)
    {
    }

    #[Route('/', name: 'geneacte_parameter_index', methods: ['GET'])]
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

    #[Route('/new', name: 'geneacte_parameter_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $parameter = new ActParams();
        $form = $this->createForm(ActParamsType::class, $parameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->parameterRepository->persist($parameter);
            $this->parameterRepository->flush();
            $this->addFlash('success', 'Le paramètre a été ajouté');

            return $this->redirectToRoute('geneacte_parameter_index', []);
        }

        return $this->render('@ExpoActe/parameter/new.html.twig', [
            'act_param' => $parameter,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'geneacte_parameter_show', methods: ['GET'])]
    public function show(ActParams $parameter): Response
    {
        return $this->render('@ExpoActe/parameter/show.html.twig', [
            'act_param' => $parameter,
        ]);
    }

    #[Route('/{uuid}/edit', name: 'geneacte_parameter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ActParams $parameter): Response
    {
        $form = $this->createForm(ActParamsType::class, $parameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->parameterRepository->flush();

            $this->addFlash('success', 'Le paramètre a été modifié');

            return $this->redirectToRoute('geneacte_parameter_index', []);
        }

        return $this->render('@ExpoActe/parameter/edit.html.twig', [
            'act_param' => $parameter,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'geneacte_parameter_delete', methods: ['POST'])]
    public function delete(Request $request, ActParams $parameter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parameter->uuid, $request->request->get('_token'))) {
            $this->parameterRepository->remove($parameter);
            $this->parameterRepository->flush();
            $this->addFlash('success', 'Le paramètre a été supprimé');
        }

        return $this->redirectToRoute('geneacte_parameter_index', []);
    }
}
