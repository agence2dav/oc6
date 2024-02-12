<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\PersistentCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Comment;
use App\Repository\CommentRepository;
use App\Repository\TrickRepository;
use App\Mapper\CommentMapper;
use App\Model\CommentModel;
use App\Entity\Trick;

class CommentService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private CommentRepository $commentRepository,
        private EntityManagerInterface $manager,
        private CommentMapper $commentMapper,
        private TrickRepository $trickRepository,
    ) {
    }

    public function getByTrick(int $id): array
    {
        //return $this->commentRepository->find($id);
        //return $this->commentRepository->findById($id);
        //$trick = $this->trickRepository->findOneById($id); //
        //$entities = $this->commentRepository->findByTrick0($id);//old
        return $this->commentRepository->findByTrick($id); //ok
    }

    public function getComments(Trick $trick): array
    {
        $commentsEntities = $trick->getComments();
        return $this->commentMapper->EntitiesToModels($commentsEntities);
    }

    public function saveComment(Comment $comment): void
    {
        $this->commentRepository->saveComment($comment);
    }

    public function deleteComment(Comment $comment): bool
    {
        if ($this->commentRepository->findOneById($comment->getId()) === null) {
            return false;
        }
        $this->commentRepository->delete($comment);
        return true;
    }

}
