<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\TrickTags;
use App\Entity\Trick;
use App\Entity\Tag;

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
            //->innerjoin(Tag::class, 'd')
            //->andWhere('d.id = td.tag')
            //->innerjoin(Trick::class, 't')
            //->andWhere('t.id = td.trick')
            ->setParameter('id', $id)
            //->orderBy('d.id', 'ASC')
            //->groupBy('t')
            //->setMaxResults(10)
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
