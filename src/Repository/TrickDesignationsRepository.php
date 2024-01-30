<?php

namespace App\Repository;

use App\Entity\TrickDesignations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TrickDesignations>
 *
 * @method TrickDesignations|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrickDesignations|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrickDesignations[]    findAll()
 * @method TrickDesignations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrickDesignationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrickDesignations::class);
    }

//    /**
//     * @return TrickDesignations[] Returns an array of TrickDesignations objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TrickDesignations
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
