<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use App\Controller\RegisterController;
use App\Form\RegisterFormType;
use App\Form\ResetPasswordFormType;
use App\Form\ResetPasswordRequestFormType;
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
    //#[Route('/login/{slug}', name: 'app_login2')]
    public function login(
        AuthenticationUtils $authenticationUtils
    ): Response {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        $lastEmail = '';
        return $this->render('security/login.html.twig', [
            //'loginForm' => $form->createView(),
            'last_email' => $lastEmail,
            'last_username' => $lastUsername,
            'error' => $error,
            //'ref' => $slug,
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
        //this will be intercepted by the firewall set in security.config
    }

    /* 
    #[Route(path: '/reset-password', name: 'forgotten_password', methods: ['GET', 'POST'])]
    public function forgottenPassword(Request $request): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userKnown = $this->userService->isUserKnown($form->get('email')->getData());
            if ($userKnown !== null) {
                $token = $this->userService->setToken($userKnown);
                $this->mailService->send(
                    'contact@marinesanson.fr',
                    $userKnown->getEmail(),
                    'Réinitialisation du mot de passe',
                    'password_reset',
                    [
                        'token' => $token,
                        'user' => $userKnown
                    ]
                );

                $this->addFlash('success', 'Email envoyé');
                return $this->redirectToRoute('app_login');
            }

            $this->addFlash('danger', 'Cette adresse mail est inconnue');
            return $this->redirectToRoute('app_login');
        } //end if

        return $this->render(
            'security/reset_password_request.html.twig',
            [
                'requestPassForm' => $form->createView()
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

                $this->addFlash('success', 'Mot de passe changé avec succes');
                return $this->redirectToRoute('app_login');
            }

            return $this->render(
                'security/reset_password.html.twig',
                [
                    'passForm' => $form->createView()
                ]
            );
        }

        $this->addFlash('danger', 'Jeton invalide');
        return $this->redirectToRoute('app_login');

    }
*/
}
