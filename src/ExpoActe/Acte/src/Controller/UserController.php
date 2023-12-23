<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Entity\User;
use ExpoActe\Acte\Repository\UserRepository;
use ExpoActe\Acte\User\Form\UserPasswordType;
use ExpoActe\Acte\User\Form\UserSearchType;
use ExpoActe\Acte\User\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[Route('/user')]
class UserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserPasswordHasherInterface $userPasswordEncoder
    ) {
    }

    #[Route('/', name: 'expoacte_user_index', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $form = $this->createForm(UserSearchType::class);
        $form->handleRequest($request);
        $users = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $users = $this->userRepository->findByName($data['name']);
        }

        $response = new Response(null, $form->isSubmitted() ? Response::HTTP_SEE_OTHER : 200);

        return $this->render('@ExpoActe/user/index.html.twig', [
            'users' => $users,
            'form' => $form,
            'isSearch' => $form->isSubmitted(),
        ], $response);
    }

    #[Route('/new', name: 'expoacte_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userRepository->persist($user);
            $this->userRepository->flush();
            $this->addFlash('success', 'L\'utilisateur a été ajouté');

            return $this->redirectToRoute('expoacte_user_show', ['uuid' => $user->uuid], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@ExpoActe/user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'expoacte_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('@ExpoActe/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{uuid}/edit', name: 'expoacte_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userRepository->flush();

            $this->addFlash('success', 'L\'utilisateur a été modifié');

            return $this->redirectToRoute('expoacte_user_show', ['uuid' => $user->uuid], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@ExpoActe/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{uuid}', name: 'expoacte_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->uuid, $request->request->get('_token'))) {
            $this->userRepository->remove($user);
            $this->userRepository->flush();
            $this->addFlash('success', 'L\utilisateur a été supprimé');
        }

        return $this->redirectToRoute('expoacte_user_index', []);
    }

    #[Route(path: '/{uuid}/password', name: 'expoacte_user_password', methods: ['GET', 'POST'])]
    public function password(Request $request, PasswordAuthenticatedUserInterface|User $user): Response
    {
        $form = $this->createForm(UserPasswordType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->userPasswordEncoder->hashPassword($user, $form->getData()->getPlainPassword());
            $user->hashpass = $password;
            $this->userRepository->flush();
            $this->addFlash('success', 'Le mot de passe a bien été modifié');

            return $this->redirectToRoute('expoacte_user_show', ['uuid' => $user->uuid]);
        }

        return $this->render(
            '@ExpoActe/user/password.html.twig',
            [
                'user' => $user,
                'form' => $form->createView(),
            ]
        );
    }
}
