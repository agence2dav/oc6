<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Model\CommentModel;
use App\Entity\Comment;
use App\Entity\User;

class CommentRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry,
        private EntityManagerInterface $manager
    ) {
        parent::__construct($registry, Comment::class);
    }

    public function findByTrick(int $id): array
    {
        return $this->createQueryBuilder('c')
            ->from(Comment::class, 'comment')
            ->select('c.id')
            ->addSelect('u.user')
            ->addSelect('c.content')
            ->addSelect('c.date')
            //->innerjoin(User::class, 'u', 'ON', 'u.id = c.user')
            ->innerjoin(User::class, 'u')
            ->andWhere('u.id = c.user')
            ->andWhere('c.trick = :id')
            ->andWhere('c.status = 1')
            ->orderBy('c.id', 'ASC')
            ->groupBy('c.id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    public function saveCommentModel(CommentModel $comment): CommentModel
    {
        $this->getEntityManager()->persist($comment);
        $this->getEntityManager()->flush();
        return $comment;
    }

    public function saveComment(Comment $comment): Comment
    {
        $this->getEntityManager()->persist($comment);
        $this->getEntityManager()->flush();
        return $comment;
    }

}
