<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Comment;
use App\Repository\CommentRepository;

class CommentService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private CommentRepository $repo,
        private EntityManagerInterface $manager
    )
    {
    }

    public function getByTrick(int $trickId): Comment|array
    {
        //return $this->repo->findById($trickId);
        return $this->repo->findByTrick($trickId);
    }
    
    public function saveComment(Comment $comment): void
    {
        $this->repo->saveComment($comment);
    }
    
    public function deleteComment(Comment $comment): bool
    {
        if ($this->repo->findOneById($comment->getId()) === null) {
            return false;
        }
        $this->repo->delete($comment);
        return true;
    }

}
