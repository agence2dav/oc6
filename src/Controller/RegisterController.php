<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterFormType;
use App\Security\EmailVerifier;
use App\Service\UserService;
use App\Entity\User;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class RegisterController extends AbstractController
{
    //private EmailVerifier $emailVerifier;

    public function __construct(
        private readonly UserService $userService,
        private readonly EmailVerifier $emailVerifier,
    ) {
        //$this->emailVerifier = $emailVerifier;
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
            //encode the plain password
            //$plainPassword = $form->get('plainPassword')->getData();
            //$password = $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
            //$user->setRoles(['ROLE_EDIT']);
            //$entityManager->persist($user);
            //$entityManager->flush();
            //$this->repo->saveUser($user);

            /* 
            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $user,
                (new TemplatedEmail())
                    ->from(new Address('agence2dav@gmail.com', 'dav'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('register/confirmation_email.html.twig')
            );
            // do anything else you need here, like send an email+
            */
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/register.html.twig', [
            'registerForm' => $form->createView(),
        ]);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_home');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_home');
    }

    /* 
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);

        // ...
    }*/

}
