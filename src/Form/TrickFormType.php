<?php

declare(strict_types=1);

namespace App\Form;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\File;
use App\Repository\UserRepository;
use App\Service\MediaService;
use App\Model\TrickModel;
use App\Entity\Trick;

class TrickFormType extends AbstractType
{

    public function __construct(
        //private AbstractController $abstractController
        private readonly UserRepository $userRepository,
        private readonly SluggerInterface $slugger,
        private readonly MediaService $mediaService,
    ) {

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
            //'data_class' => TrickModel::class,
            //'data_class' => null,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control mb-3'
                    ],
                    'label' => 'Titre'
                ]
            )
            ->add(
                'content',
                TextareaType::class,
                [
                    'attr' => [
                        'class' => 'form-control mb-3',
                        'rows' => '12'
                    ],
                    'label' => 'Description'
                ]
            )
            ->add(
                'image',
                HiddenType::class,
                [
                    'attr' => [
                        'class' => 'form-control mb-3'
                    ],
                    'label' => 'Image'
                ]
            )

            ->add('media', FileType::class, [
                'label' => 'Image',
                'attr' => [
                    'class' => 'form-control mb-3'
                ],

                //iterable
                'multiple' => true,

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using attributes
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new All(
                        new Image(
                            [
                                'maxWidth' => 4096,
                                'maxWidthMessage' => 'Largeur max : {{ max_width }}',
                                'maxHeight' => 4096,
                                'maxHeightMessage' => 'Hauteur max : {{ max_height }}',
                            ]
                        )
                    )
                ]
            ])
            ->getForm();
        /*
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
        )*/

        /*      
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

}
