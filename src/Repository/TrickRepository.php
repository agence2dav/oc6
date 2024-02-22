<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Trick;

class TrickRepository extends ServiceEntityRepository
{

    public function __construct(
        ManagerRegistry $registry
    ) {
        parent::__construct($registry, Trick::class);
    }

    public function findByStatus(): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.status = 1')
            ->orderBy('t.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.id', 'DESC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findMy(int $uid): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.user = :uid')
            ->setParameter('uid', $uid)
            ->orderBy('t.id', 'DESC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function saveTrick(Trick $trick): void
    {
        $this->getEntityManager()->persist($trick);
        $this->getEntityManager()->flush();
    }

}
