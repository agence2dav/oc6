<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Comment;
use App\Entity\User;

/**
 * @extends ServiceEntityRepository<Comment>
 *
 * @method Comment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comment[]    findAll()
 * @method Comment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry,
        private EntityManagerInterface $manager
    ) {
        parent::__construct($registry, Comment::class);
    }

    /* 
    public function findByTrick0(int $id): Comment|array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT c.id, u.user, c.content, c.date
            FROM App\Entity\Comment c
            INNER JOIN App\Entity\User u
            WHERE u.id = c.user
            AND c.trick = :id
            AND c.status = 1
            ORDER BY c.id ASC
            '
        )
            ->setParameter('id', $id);

        return $query->getResult(); //getOneOrNullResult();
    }*/

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

}
