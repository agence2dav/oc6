<?php

declare(strict_types=1);

namespace App\Form;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Repository\UserRepository;
use App\Entity\User;

class UserFormType extends AbstractType //AbstractType
{

    public function __construct(
        //private AbstractController $abstractController
        private readonly UserRepository $userRepository,
        private readonly SluggerInterface $slugger,
    ) {

    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            /* 
             */
            ->add(
                '_username',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control mb-3'
                    ],
                    'label' => 'Username',
                    'constraints' => [
                        new Length([
                            'min' => 2,
                            'minMessage' => 'Le nom d\'utilisateur doit faire au moins {{ limit }} caractères',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                ]
            )

            /* 
            ->add(
                'email',
                EmailType::class,
                [
                    'attr' => [
                        'class' => 'form-control mb-3'
                    ],
                    'label' => 'Adresse e-mail',
                    'constraints' => [
                        new Email(
                            [
                                'message' => 'Vous devez entrer un email valide.'
                            ]
                        ),
                    ],
                ]
            )
            */
            ->add(
                '_password',
                PasswordType::class,
                [
                    'mapped' => false,
                    'attr' => [
                        'class' => 'form-control mb-3',
                        'autocomplete' => 'new-password'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Entrez un mot de passe',
                        ]),
                    ],
                ]
            )
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

}
