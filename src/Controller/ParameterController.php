<?php

namespace App\Controller;

use App\Entity\ActParams;
use App\Form\ActParamsType;
use App\Repository\ParameterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/parameter')]
class ParameterController extends AbstractController
{
    #[Route('/', name: 'app_parameter_index', methods: ['GET'])]
    public function index(ParameterRepository $parameterRepository): Response
    {
        $parameters = $parameterRepository->findAllOrdered();

        return $this->render('parameter/index.html.twig', [
            'parameters' => $parameters,
        ]);
    }

    #[Route('/new', name: 'app_parameter_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actParam = new ActParams();
        $form = $this->createForm(ActParamsType::class, $actParam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($actParam);
            $entityManager->flush();

            return $this->redirectToRoute('app_parameter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parameter/new.html.twig', [
            'act_param' => $actParam,
            'form' => $form,
        ]);
    }

    #[Route('/{param}', name: 'app_parameter_show', methods: ['GET'])]
    public function show(ActParams $actParam): Response
    {
        return $this->render('parameter/show.html.twig', [
            'act_param' => $actParam,
        ]);
    }

    #[Route('/{param}/edit', name: 'app_parameter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ActParams $actParam, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActParamsType::class, $actParam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_parameter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parameter/edit.html.twig', [
            'act_param' => $actParam,
            'form' => $form,
        ]);
    }

    #[Route('/{param}', name: 'app_parameter_delete', methods: ['POST'])]
    public function delete(Request $request, ActParams $actParam, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actParam->getParam(), $request->request->get('_token'))) {
            $entityManager->remove($actParam);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_parameter_index', [], Response::HTTP_SEE_OTHER);
    }
}
