<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\Comment;
use App\Repository\CommentRepository;
use App\Repository\TrickRepository;
use App\Mapper\CommentMapper;
use App\Entity\Trick;

class CommentService
{

    public function __construct(
        private CommentRepository $commentRepository,
        private EntityManagerInterface $manager,
        private CommentMapper $commentMapper,
        private TrickRepository $trickRepository,
    ) {
    }

    public function getCommentsPaginator(Trick $trick, int $offset): array
    {
        $paginator = $this->commentRepository->getCommentsPaginator($trick, $offset);
        $commentsEntities = $paginator->getQuery()->getResult();
        return $this->commentMapper->EntitiesArrayToModels($commentsEntities);
    }

    /* 
    public function getCommentsPaginator2(Trick $trick, int $offset): Collection
    {
        return array_slice($trick->getComments(),$offset,10);
    }*/

    public function getNumberOfCommentsByTricks(Trick $trick): int
    {
        return $this->commentRepository->countByTricks($trick);
    }

    public function getComments(Trick $trick): array
    {
        $commentsEntities = $trick->getComments();
        return $this->commentMapper->EntitiesToModels($commentsEntities);
    }

    public function saveComment($form, Trick $trick, User $user): void
    {
        $commentModel = new Comment();
        $commentModel->setTrick($trick);
        $commentModel->setUser($user);
        $commentModel->setDate(new \DateTime());
        $commentModel->setContent($form->get("content")->getData());
        $commentModel->setStatus(1); //by default
        $this->commentRepository->saveComment($commentModel);
    }

    public function deleteComment(Comment $comment): bool
    {
        if ($this->commentRepository->findOneById($comment->getId())) {
            $this->commentRepository->delete($comment);
            return true;
        }
        return false;
    }

    //admin

    public function getAllComments(): array
    {
        $commentModel = $this->commentRepository->findAll();
        return $this->commentMapper->EntitiesArrayToModels($commentModel);
    }

    public function getMyComments(int $uid): array
    {
        $commentModel = $this->commentRepository->findMy($uid);
        return $this->commentMapper->EntitiesArrayToModels($commentModel);
    }

    public function updateStatus(int $id): void
    {
        $comment = $this->commentRepository->findOneById($id);
        $status = $comment->getStatus();
        $status = $status == 1 ? 0 : 1;
        $comment->setStatus($status);
        $this->commentRepository->saveComment($comment);
    }

}
