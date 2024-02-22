<?php

namespace App\Repository;

use App\Entity\Cat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cat::class);
    }

    public function saveCat(Cat $trick): void
    {
        $this->getEntityManager()->persist($trick);
        $this->getEntityManager()->flush();
    }

}
