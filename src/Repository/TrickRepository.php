<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
//use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
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

    public function findBySlug(string $slug): string
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.slug = :slug')
            ->andWhere('t.status = 1')
            ->setParameter('slug', $slug)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }

    public function saveTrick(Trick $trick): void
    {
        $this->getEntityManager()->persist($trick);
        $this->getEntityManager()->flush();
    }

    public function delete(Trick $trick): void
    {
        $this->getEntityManager()->remove($trick);
        $this->getEntityManager()->flush();
    }

}
