<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterFormType;
use App\Entity\User;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class SecurityController //extends AbstractController
{

    public function __construct(
        Security $security,
    ) {
    }

    public function generateReport(): void
    {
        //check role
        if ($this->security->isGranted('ROLE_SALES_ADMIN')) {
            //???
        }

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED');

    }

    /* 
    {% if is_granted('ROLE_ADMIN') %}
    <a href="...">Delete</a>
    {% endif %}
    */

    //You can use IS_AUTHENTICATED anywhere roles are used: like access_control or in Twig.
    //https://symfony.com/doc/current/security.html#securing-other-services

}
