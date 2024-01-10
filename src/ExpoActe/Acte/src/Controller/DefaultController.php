<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Form\SearchHeaderNameType;
use ExpoActe\Acte\Repository\ParameterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    public function __construct(
        private readonly ParameterRepository $parameterRepository,
    ) {
    }

    #[Route(path: '/', name: 'expoacte_home')]
    public function index(): Response
    {
        $intro = $this->parameterRepository->findOneByKey('AVERTISMT');

        return $this->render(
            '@ExpoActe/default/index.html.twig',
            [
                'intro' => $intro,
            ]
        );
    }

    #[Route(path: '/search/form', name: 'expoacte_search_form')]
    public function searchForm(): Response
    {
        $form = $this->createForm(
            SearchHeaderNameType::class,
            [],
            [
                'method' => 'GET',
                'action' => $this->generateUrl('expoacte_search_form'),
            ]
        );

        return $this->render(
            '@ExpoActe/_search_form.html.twig',
            [
                'form' => $form,
            ]
        );
    }
}
