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

    /* */


    public function findByTrick(int $trickId): Comment|array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT c.id, u.name, c.content, c.date
            FROM App\Entity\Comment c
            INNER JOIN App\Entity\User u
            WHERE u.id = c.user_id
            AND c.trick_id = :id
            AND c.status = 1
            ORDER BY c.id ASC
            '
        )
            ->setParameter('id', $trickId);

        return $query->getResult(); //getOneOrNullResult();
    }

    public function findByTrick1(int $trickId): Comment|array
    {
        return $this->createQueryBuilder('c')
            ->from(Comment::class, 'comment')
            ->select('c.id')
            ->addSelect('c.user_id')
            ->addSelect('c.content')
            ->addSelect('c.date')
            ->andWhere('c.trick_id = :id')
            ->setParameter('id', $trickId)
            ->andWhere('c.status = 1')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByTrick0(int $trickId): Comment|array
    {
        $queryBuilder = $this->manager->createQueryBuilder('c');
        $queryBuilder->from(Comment::class, 'comment');
        $queryBuilder->select('c.id')
            ->addSelect('c.user_id')
            ->addSelect('c.content')
            ->addSelect('c.date')
            //->setMaxResults($limit)
            //->setFirstResult(($page * $limit) - $limit)
            ->andWhere('c.trick_id = :id')
            ->setParameter('id', $trickId)
            ->andWhere('c.status = 1')
            ->orderBy('c.id', 'ASC');

        return $queryBuilder->getQuery()->getResult(); //toIterable();
    }

    //    /**
//     * @return Comment[] Returns an array of Comment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    //    public function findOneBySomeField($value): ?Comment
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
