<?php

declare(strict_types=1);

namespace App\Form;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\ChoiceList\ChoiceListInterface;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Validator\Constraints\NotBlank;
use App\Repository\UserRepository;
use App\Service\MediaService;
use App\Repository\CatRepository;
use App\Repository\TagRepository;
use App\Entity\TrickTags;
use App\Entity\Trick;
use App\Entity\Cat;
use App\Entity\Tag;

class TrickTagsFormType extends AbstractType
{

    public function __construct(
        //private AbstractController $abstractController
        private readonly UserRepository $userRepository,
        private readonly MediaService $mediaService,
    ) {

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            //'data_class' => TrickTags::class
            'data_class' => null
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'trick',
                HiddenType::class,
                [
                    //'value' => $options['trickId'],
                ]
            )
            /* 
                    'attr' => [
                        'class' => 'form-select mb-3',
                        'size' => "2"
                    ],
                    'mapped' => false,
                    'multiple' => true,
            )
            */
            /* 
            ->add(
                'cat',
                EntityType::class,
                [
                    'class' => Cat::class,
                    'choice_label' => 'name',
                    //'choice_label' => fn($cat) => $cat->getId() . '-' . $cat->getName(),//Cat
                    //'query_builder' => fn(CatRepository $catRepo) => $catRepo->createQueryBuilder('c')->orderBy('c.name', 'ASC'),
                    'label' => 'Selectionnez une catégorie de tags',
                    'placeholder' => 'Choisissez une catégorie',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Choisissez une catégorie',
                        ]),
                    ],
                ]
            ->add(
                'tag',
                EntityType::class,
                [
                    'class' => Tag::class,
                    'choice_label' => 'name',
                    'query_builder' => fn(TagRepository $tagRepo) => $tagRepo->createQueryBuilder('c')->orderBy('c.name', 'ASC'),
                    'label' => 'Selectionnez un tag',
                    'placeholder' => 'Choisissez un tag',//not works
                    'disabled' => true,
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Choisissez un tag',
                        ]),
                    ],
                ]
            )
            
            */
            /* 
            ->add(
                'tags',
                EntityType::class,
                [
                    'class' => Tag::class,
                    //'choice_label' => 'name',
                    'choice_label' => fn($tag) => $tag->getCat()->getName() . ' : ' . $tag->getName(),//call model
                    //'query_builder' => fn(TagRepository $tagRepo) => $tagRepo->createQueryBuilder('c')->orderBy('c.name', 'ASC'),
                    'label' => 'Selectionnez un tag',
                    'placeholder' => 'Choisissez un tag',//not works
                    //'disabled' => true,
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Choisissez un tag',
                        ]),
                    ],
                ]
            )*/

            /* */
            ->add('tagId')
            ->add('Enregistrer', SubmitType::class)
            ->getForm();
    }

}
