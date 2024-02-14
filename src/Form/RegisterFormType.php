<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class RegisterFormType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'username',
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
            ->add(
                'email',
                EmailType::class,
                [
                    'attr' => [
                        'class' => 'form-control mb-3'
                    ],
                    'label' => 'Email',
                    'constraints' => [
                        new Email(
                            [
                                'message' => 'Vous devez entrer un email valide.'
                            ]
                        ),
                    ],
                ]
            )
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'autocomplete' => 'new-password'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un mot de passe',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Le mot de passe doit faire au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('confirmPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'autocomplete' => 'new-password'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Confirm password',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            /* 
            ->add(
                'agreeTerms',
                CheckboxType::class,
                [
                    'mapped' => false,
                    'attr' => [
                        'class' => 'form-control mb-3'
                    ],
                    'label' => 'Acceptation des conditions d\'utilisation',
                    'constraints' => [
                        new IsTrue(
                            [
                                'message' => 'Vous devez acceptez les conditions d\'utilisation du site.',
                            ]
                        ),
                    ]
                ]
            )*/

            //->add('roles')
        ;
    }
}
