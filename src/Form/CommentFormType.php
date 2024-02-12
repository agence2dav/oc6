<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\SecurityBundle\Security;
use App\Entity\Comment;
use App\Entity\Trick;
use App\Entity\User;

class CommentFormType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }

    public function saveForm(Comment $comment, EntityManagerInterface $manager, Trick $trick, User $user): void
    {
        $comment->setTrick($trick);
        $comment->setUser($user);
        $comment->setDate(new \DateTime());
        //$comment->setContent();
        $comment->setStatus(1); //perform later
        $manager->persist($comment);
        $manager->flush();
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'content',
                TextareaType::class,
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
