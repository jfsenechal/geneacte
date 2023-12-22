<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Entity\Article;
use ExpoActe\Acte\Form\ArticleType;
use ExpoActe\Acte\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article')]
class ArticleController extends AbstractController
{
    public function __construct(private readonly ArticleRepository $articleRepository)
    {
    }

    #[Route('/', name: 'expoacte_article_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('@ExpoActe/article/index.html.twig', [
            'articles' => $this->articleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'expoacte_article_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->articleRepository->persist($article);
            $this->articleRepository->flush();

            return $this->redirectToRoute('expoacte_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@ExpoActe/article/new.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'expoacte_article_show', methods: ['GET'])]
    public function show(Article $article): Response
    {
        return $this->render('@ExpoActe/article/show.html.twig', [
            'article' => $article,
        ]);
    }

    #[Route('/{id}/edit', name: 'expoacte_article_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->articleRepository->flush();

            return $this->redirectToRoute('expoacte_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@ExpoActe/article/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'expoacte_article_delete', methods: ['POST'])]
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $this->articleRepository->remove($article);
            $this->articleRepository->flush();
        }

        return $this->redirectToRoute('expoacte_article_index', [], Response::HTTP_SEE_OTHER);
    }
}
