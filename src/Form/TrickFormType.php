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
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\ChoiceList\ChoiceListInterface;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\UserRepository;
use App\Service\MediaService;
use App\Model\TrickModel;
use App\Entity\Trick;
use App\Entity\Designation;
use App\Entity\TrickDesignations;
use App\StaticClass;

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

            ->add(
                'media',
                FileType::class,
                [
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
                ]
            )
            /* */
            ->add(
                'trickDesignations',
                EntityType::class,
                [
                    'attr' => [
                        'class' => 'form-select mb-3',
                        'size' => "2"
                    ],
                    'class' => Designation::class,
                    'mapped' => false,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'label' => 'Selectionnez une ou plusieurs désignations'
                ]
            )
            /* //ok
            ->add('trickDesignations', ChoiceType::class, [
                'choices' => [
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,
                ],
            ])*/
            /* 
            ->add('trickDesignations', CheckboxType::class, [
                'choices' => [
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,
                ],
            ])*/

            ->add('Enregistrer', SubmitType::class)
            /* 
            ->add(
                'designations',
                ChoiceType::class,
                [
                    'attr' => [
                        'class' => 'form-select mb-3',
                        'size' => "4"
                    ],
                    'class' => Designation::class,
                    'mapped' => false,
                    'choice_label' => 'designations',
                    'label' => 'Selectionnez une ou plusieurs désignations',
                    //'choice_attr' => ChoiceList::attr($this, function (?Designation $designation): array {
                    //    return $designation ? ['data-name' => $designation->getName()] : [];
                    //}),
                ]
            )*/

            ->getForm();

        /*      
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
