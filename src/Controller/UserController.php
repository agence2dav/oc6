<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Form\UserFormType;
use App\Service\UserService;
use App\Service\MailService;

class UserController extends AbstractController
{

    public function __construct(
        private readonly UserPasswordHasherInterface $userPasswordHasher,
        private readonly ResetPasswordHelperInterface $resetPasswordHelper,
        private readonly EntityManagerInterface $entityManager,
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

        //$hasAccess = $this->isGranted('ROLE_ADMIN');
        //$this->denyAccessUnlessGranted('ROLE_EDIT');
        if ($this->security->isGranted('ROLE_USER')) {
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

}
