<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\PersistentCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
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

    public function getCommentPaginator(Request $request, Trick $trick): Paginator
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $commentsEntities = $this->commentRepository->getCommentPaginator($trick, $offset);
        //return $this->commentMapper->EntitiesArrayToModels($commentsEntities);
        return $commentsEntities;
    }

    public function getComments(Trick $trick): array
    {
        $commentsEntities = $trick->getComments();
        return $this->commentMapper->EntitiesToModels($commentsEntities);
    }

    public function saveComment($form, Trick $trick, User $user): void
    {
        //$commentModel = new CommentModel(); //The class 'App\Model\CommentModel' was not found in the chain configured namespaces App\Entity
        $commentModel = new Comment();
        $commentModel->setTrick($trick);
        $commentModel->setUser($user);
        $commentModel->setDate(new \DateTime());
        $commentModel->setContent($form->get("content")->getData());
        $commentModel->setStatus(0); //by default
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
