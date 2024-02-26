<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\TrickTags;

class TrickTagsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrickTags::class);
    }

    public function findByTagId(int $id): array
    {
        return $this->createQueryBuilder('td')
            ->andWhere('td.tag = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }

    public function saveTrickTags(TrickTags $trickTag): void
    {
        $this->getEntityManager()->persist($trickTag);
        $this->getEntityManager()->flush();
    }

    public function delete(TrickTags $trickTag): void
    {
        $this->getEntityManager()->remove($trickTag);
        $this->getEntityManager()->flush();
    }

}
