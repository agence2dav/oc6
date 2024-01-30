<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Model\CommentModel;


class CommentFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'content', TextType::class, [
                    'attr' => [
                        'class' => 'form-control w-lg-75 m-auto'
                    ],
                    'label' => 'Poster un commentaire :'
                ]
            )
            ->add('trickId', HiddenType::class, ['mapped' => false])
            ->add('userId', HiddenType::class, ['mapped' => false]);
    }

}
