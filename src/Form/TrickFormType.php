<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Trick;

class TrickFormType extends AbstractType
{

    public function __construct(
        //private AbstractController $abstractController
    ) {

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }

    public function saveForm(Trick $trick, EntityManagerInterface $manager): void
    {
        if (!$trick->getId()) {
            $trick->setUser(1);
            $trick->setCreatedAt(new \DateTime());
            $trick->setUpdatedAt(new \DateTime());
            $trick->setStatus(1);
        }
        $manager->persist($trick);
        $manager->flush();
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('image')
            ->getForm();


        /*      
                    ->add(
                        'name', TextType::class, [
                            'attr' => [
                                'class' => 'form-control mb-3'
                            ],
                            'label' => 'Titre'
                        ]
                    )
                    ->add(
                        'description', TextType::class, [
                            'attr' => [
                                'class' => 'form-control mb-3'
                            ],
                            'label' => 'Description'
                        ]
                    )
                    ->add(
                        'trickGroup', EntityType::class, [
                            'attr' => [
                                'class' => 'form-select mb-3',
                                'size' => "2"
                            ],
                            'class' => 'form-control mb-3',
                            'choice_label' => 'name',
                            'multiple' => true,
                            'label' => 'Selectionnez un ou plusieurs groupe(s)'
                        ]
                    )
                    ->add(
                        'images', FileType::class, [
                            'attr' => [
                                'class' => 'form-control mb-3'
                            ],
                            'label' => 'Télécharger une ou plusieurs image(s)',
                            'multiple' => true,
                            'mapped' => false,
                            'required' => false,
                            'constraints' => [
                                new All(
                                    new Image(
                                        [
                                            'maxWidth' => 1600,
                                            'maxWidthMessage' => 'l\'image doit faire {{ max_width }} pixels de large au maximum',
                                            'maxHeight' => 1600,
                                            'maxHeightMessage' => 'l\'image doit faire {{ max_height }} pixels de long au maximum',
                                        ]
                                    )
                                )
                            ]
                        ]
                    )
                    ->add(
                        'videos', UrlType::class, [
                            'attr' => [
                                'class' => 'form-control mb-3'
                            ],
                            'label' => 'Coller l\'url de la vidéo que vous souhaitez ajouter',
                            'mapped' => false,
                            'required' => false,
                            'constraints' => [
                                new Regex(
                                    [
                                        'pattern' => '/https?:\/\/www\.youtube\.com/',
                                        'message' => 'Seules les liens Youtube sont acceptés'
                                    ]
                                )
                            ]
                        ]
                    );
        */
    }

    /*    public function configureOptions(OptionsResolver $resolver): void
        {

            $resolver->setDefaults(
                [
                    'data_class' => Trick::class,
                ]
            );

        }*/

}
