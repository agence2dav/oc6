<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Form\RegisterFormType;
use App\Security\EmailVerifier;
use App\Service\UserService;
use App\Entity\User;

class RegisterController extends AbstractController
{
    public function __construct(
        private readonly UserService $userService,
        private readonly EmailVerifier $emailVerifier,
    ) {
    }

    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
    ): Response {
        $user = new User();
        $form = $this->createForm(RegisterFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->userService->saveUser($user, $form->get('plainPassword')->getData());
            //send signed email
            $this->emailVerifier->sendEmailConfirmation(
                'app_register_verif',
                $user,
                (new TemplatedEmail())
                    ->from(new Address('agence2dav@gmail.com', 'dav'))
                    ->to($user->getEmail())
                    ->subject('SnowTricks : confirmez votre Email')
                    ->htmlTemplate('security/confirmation_email.html.twig')
            );

            $this->addFlash('login-flash', 'Votre inscription est enregistrée. 
            Veuillez vérifier votre e-mail pour la confirmer.');
            return $this->redirectToRoute('app_login');
        }
        return $this->render('security/register.html.twig', [
            'registerForm' => $form->createView(),
        ]);
    }

    #[Route('/verify/email', name: 'app_register_verif')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        //receive confirmation link, set isVerified=true
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('login-flash', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));
            return $this->redirectToRoute('app_login');
        }
        $this->addFlash('login-flash', 'Votre Email a été vérifié avec succès.');
        return $this->redirectToRoute('app_login');
    }

}
