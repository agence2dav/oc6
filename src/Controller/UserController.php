<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use App\Controller\RegisterController;
use App\Form\UserFormType;
use App\Form\RegisterFormType;
use App\Form\ResetPasswordFormType;
use App\Form\ForgottenPasswordFormType;
use App\Repository\UserRepository;
use App\Service\UserService;
use App\Service\MailService;
use App\Entity\User;

class UserController extends AbstractController
{

    public function __construct(
        private readonly UserPasswordHasherInterface $userPasswordHasher,
        private readonly MailService $mailService,
        private UserFormType $userFormType,
        private UserService $userService,
        private Security $security,
    ) {

    }

    #[Route('/login', name: 'app_login')]
    public function login(
        AuthenticationUtils $authenticationUtils
    ): Response {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        //if ($this->security->denyAccessUnlessGranted('IS_AUTHENTICATED')) {
        if ($this->security->isGranted('ROLE_EDIT')) {
            $this->addFlash('home-flash', 'Vous êtes connecté avec succès.');
        }
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/user', name: 'app_userPage')]
    public function userPage()
    {
        return $this->render('home/userpage.html.twig', []);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        $this->addFlash('home-flash', 'Vous êtes déconnecté.');
        //intercepted by firewall in security.config
    }

    #[Route(path: '/reset-password', name: 'forgotten_password', methods: ['GET', 'POST'])]
    public function forgottenPassword(Request $request): Response
    {
        $form = $this->createForm(ForgottenPasswordFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userKnown = $this->userService->isUserKnown($form->get('email')->getData());
            if ($userKnown !== null) {
                $token = $this->userService->setToken($userKnown);
                $this->mailService->send(
                    'agence2dav@gmail.com',
                    $userKnown->getEmail(),
                    'Réinitialisation du mot de passe',
                    'resetpswdmail', //emails dir
                    [
                        'token' => $token,
                        'user' => $userKnown
                    ]
                );
                $this->addFlash('login-flash', 'Un e-mail vous a été envoyé. Cliquez sur le lien pour renouveler votre mot de passe.');
                return $this->redirectToRoute('app_login');
            }
            $this->addFlash('login-flash', 'Cette adresse e-mail est inusitée');
            return $this->redirectToRoute('app_login');
        }
        return $this->render(
            'security/forgottenpswd.html.twig',
            [
                'pswdForm' => $form->createView()
            ]
        );
    }

    #[Route(path: '/reset-password/{token}', name: 'reset_password', methods: ['GET', 'POST'])]
    public function resetPassword(string $token, Request $request): Response
    {
        $userModel = $this->userService->findUserByResetToken($token);
        if ($userModel !== null) {
            $form = $this->createForm(ResetPasswordFormType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->userService->setNewPassword($userModel, $form->get('password')->getData());
                $this->addFlash('login-flash', 'Mot de passe modifié avec succes.');
                return $this->redirectToRoute('app_login');
            }
            return $this->render(
                'security/login-flash.html.twig',
                [
                    'pswdForm' => $form->createView()
                ]
            );
        }
        $this->addFlash('login-flash', 'Ah, bah ça n\'a pas marché. Recommencez.');
        return $this->redirectToRoute('app_login');
    }
}
