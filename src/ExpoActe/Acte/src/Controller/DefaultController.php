<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Form\SearchHeaderNameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route(path: '/', name: 'expoacte_home')]
    public function index(): Response
    {
        return $this->render(
            '@ExpoActe/default/index.html.twig',
            [
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