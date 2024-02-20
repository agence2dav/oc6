<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\TrickDesignations;
use App\Entity\Designation;
use App\Entity\Trick;

class TrickDesignationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrickDesignations::class);
    }

    public function findByDesignationId(int $id): array
    {
        return $this->createQueryBuilder('td')
            ->andWhere('td.designation = :id')
            ->innerjoin(Designation::class, 'd', )
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
