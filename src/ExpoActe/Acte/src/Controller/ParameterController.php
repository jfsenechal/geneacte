<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Entity\Parameter;
use ExpoActe\Acte\Parameter\Form\ParamType;
use ExpoActe\Acte\Repository\ParameterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/parameter')]
class ParameterController extends AbstractController
{
    public function __construct(
        private readonly ParameterRepository $parameterRepository
    ) {
    }

    #[Route('/{name}', name: 'expoacte_parameter_index', methods: ['GET'])]
    public function index(string $name = 'Affichage'): Response
    {
        $parameters = $this->parameterRepository->findByGroup($name);
        $groups = $this->parameterRepository->findAllGroup();

        return $this->render('@ExpoActe/parameter/index.html.twig', [
            'parameters' => $parameters,
            'groups' => $groups,
            'groupName' => $name,
        ]);
    }

    #[Route('/{uuid}/show', name: 'expoacte_parameter_show', methods: ['GET'])]
    public function show(Parameter $parameter): Response
    {
        return $this->render('@ExpoActe/parameter/show.html.twig', [
            'act_param' => $parameter,
        ]);
    }

    #[Route('/{param}/edit', name: 'expoacte_parameter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Parameter $parameter): Response
    {
        $form = $this->createForm(ParamType::class, $parameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->parameterRepository->flush();

            $this->addFlash('success', 'Le paramètre a été modifié');

            return $this->redirectToRoute('expoacte_parameter_index', [
                'name' => $parameter->groupe,
            ]);
        }

        return $this->render('@ExpoActe/parameter/edit.html.twig', [
            'parameter' => $parameter,
            'form' => $form,
        ]);
    }

    #[Route('/{param}/delete', name: 'expoacte_parameter_delete', methods: ['POST'])]
    public function delete(Request $request, Parameter $parameter): Response
    {
        if ($this->isCsrfTokenValid('delete' . $parameter->uuid, $request->request->get('_token'))) {
            $parameter->valeur = null;
            $this->parameterRepository->flush();
            $this->addFlash('success', 'Le paramètre a été supprimé');
        }

        return $this->redirectToRoute('expoacte_parameter_index', []);
    }
}
