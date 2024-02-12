<?php

declare(strict_types=1);

namespace App\Controller;

//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
//use App\Controller\RegisterController;
use App\Form\RegisterFormType;
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
    public function login(
        User $user = null,
        Request $request,
        EntityManagerInterface $manager,
        UserPasswordHasherInterface $userPasswordHasher,
        AuthenticationUtils $authenticationUtils
    ): Response {

        $error = $authenticationUtils->getLastAuthenticationError();
        //$lastUsername = $authenticationUtils->getLastUsername();
        //$lastEmail = $authenticationUtils->getLastEmail();
        $lastUsername = '';
        $lastEmail = '';
        //if (!$user) {}
        //$user = new User();
        //$form = $this->createForm(UserFormType::class, $user, []);
        //$form->handleRequest($request);
        /*if ($form->isSubmitted() && $form->isValid()) {
            //$this->userFormType->saveForm($user, $manager);
            //$form = $this->createForm(UserFormType::class, $user);
            //$form->handleRequest($request);

             if (!$user->getId()) {
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );
            }
            $user->setRoles([]);
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('app_home', []);
        }*/

        //$user = $this->userService->getById($user);
        return $this->render('security/login.html.twig', [
            //'loginForm' => $form->createView(),
            'last_email' => $lastEmail,
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }



    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {

    }

}
