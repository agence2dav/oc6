<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Comment;


class CommentFormType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }

    public function saveForm(Comment $comment, EntityManagerInterface $manager, int $id): void
    {
        if (!$comment->getId()) {
        }
        $comment->setTrick($id);
        $comment->setUser(1);
        $comment->setDate(new \DateTime());
        //$comment->setContent();
        $comment->setStatus(1);
        $manager->persist($comment);
        $manager->flush();
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'content',
                TextType::class,
                [
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
