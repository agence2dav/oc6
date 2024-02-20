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
            ->andWhere('td.designation = :id')
            ->innerjoin(Tag::class, 'd', )
            ->innerjoin(Trick::class, 't')
            ->andWhere('d.id = td.designation')
            ->andWhere('t.id = td.trick')
            ->setParameter('id', $id)
            //->orderBy('d.id', 'ASC')
            //->groupBy('t')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
}
