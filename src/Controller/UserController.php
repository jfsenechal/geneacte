<?php

namespace App\Controller;

use App\Entity\ActUser3;
use App\Form\UserSearchType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
#[AsController]
class UserController extends AbstractController
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    #[Route('/', name: 'geneacte_user_index', methods: ['GET','POST'])]
    public function index(Request $request): Response
    {
        $form = $this->createForm(UserSearchType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $users = $this->userRepository->findByName($form->get('name')->getData());
        } else {
            $users = $this->userRepository->findAllOrdered();
        }

        return $this->render('@ExpoActe/user/index.html.twig', [
            'users' => $users,
            'form' => $form,
        ]);
    }

    #[Route('/new', name: 'geneacte_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $user = new ActUser3();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userRepository->persist($user);
            $this->userRepository->flush();
            $this->addFlash('success', 'L\'utilisateur a été ajouté');

            return $this->redirectToRoute('geneacte_user_show', ['uuid' => $user->uuid]);
        }

        return $this->render('@ExpoActe/user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'geneacte_user_show', methods: ['GET'])]
    public function show(ActUser3 $user): Response
    {
        return $this->render('@ExpoActe/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{uuid}/edit', name: 'geneacte_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ActUser3 $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userRepository->flush();

            $this->addFlash('success', 'L\'utilisateur a été modifié');

            return $this->redirectToRoute('geneacte_user_show', ['uuid' => $user->uuid]);
        }

        return $this->render('@ExpoActe/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'geneacte_user_delete', methods: ['POST'])]
    public function delete(Request $request, ActUser3 $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->uuid, $request->request->get('_token'))) {
            $this->userRepository->remove($user);
            $this->userRepository->flush();
            $this->addFlash('success', 'L\utilisateur a été supprimé');
        }

        return $this->redirectToRoute('geneacte_user_index', []);
    }
}
