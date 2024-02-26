<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\UserRepository;
use App\Service\MediaService;
use App\Service\CatService;

class TrickTagsFormType extends AbstractType
{

    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly MediaService $mediaService,
        private readonly CatService $catService,
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
                ]
            )
            ->add('tagId')
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'disabled' => false,
            ])
            /* */
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) {
                    $tagId = $event->getData()['tagId'] ?? null;
                    if ($tagId) {
                        $event->getForm()->add('save', SubmitType::class, [
                            'label' => 'Enregistrer',
                            'disabled' => false,
                        ]);
                    }
                }
            )
            ->getForm();
    }

}
