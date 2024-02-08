<?php

declare(strict_types=1);

namespace App\Controller;

//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use App\Service\UserService;
use App\Form\UserFormType;
use App\Entity\User;

class UserController extends AbstractController
{

    public function __construct(
        private UserService $userService,
        private UserFormType $userFormType,
        //private User $user,
    ) {

    }

    #[Route('/login', name: 'app_login')]
    public function login(User $user = null, Request $request, EntityManagerInterface $manager): Response
    {
        if (!$user) {
            $user = new User();
        }

        $options = [
            //'require_title' => 'Le titre est requit',
        ];
        $form = $this->createForm(UserFormType::class, $user, $options);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userFormType->saveForm($user, $manager);
            return $this->redirectToRoute('app_home', []);
        }

        //$user = $this->userService->getById($user);
        return $this->render('home/login.html.twig', [
            'formUser' => $form->createView(),
            'edit_mode' => $user->getId() ? true : false,
            'user' => $user,
        ]);
    }

}
