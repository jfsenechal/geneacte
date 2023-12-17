<?php

namespace App\Controller;

use App\Form\SearchHeaderNameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route(path: '/', name: 'geneacte_home')]
    public function index(): Response
    {
        return $this->render(
            '@GeneActe/default/index.html.twig',
            [
            ]
        );
    }

    #[Route(path: '/search/form', name: 'geneacte_search_form')]
    public function searchForm(): Response
    {
        $form = $this->createForm(
            SearchHeaderNameType::class,
            [],
            [
                'method' => 'GET',
                'action' => $this->generateUrl('geneacte_search_form'),
            ]
        );

        return $this->render(
            '@GeneActe/_search_form.html.twig',
            [
                'form' => $form,
            ]
        );
    }

}