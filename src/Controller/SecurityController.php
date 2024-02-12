<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterFormType;
use App\Entity\User;

class SecurityController extends AbstractController
{
    #[Route('/registration', name: 'app_security_registration')]
    public function Registration(): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterFormType::class, $user);
        return $this->render('security/registration.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
