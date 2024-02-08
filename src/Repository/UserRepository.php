<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findById(int $id): ?User
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findByRole(int $role): ?array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.role = :role')
            ->setParameter('role', $role)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function UserRole(int $id): ?array
    {
        return $this->createQueryBuilder('t')
            ->addSelect('t.role')
            ->andWhere('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
