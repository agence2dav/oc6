<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
//use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Model\TrickModel;
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

    /* unused
    public function findBySlug(string $slug): array|null
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

    //$service = $repository->findBy(array('name' => 'Registration'),array('name' => 'ASC'),1 ,0)[0];

    public function findOneBySlug(string $slug): Trick|null
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

    public function findById(int $id): Trick|null
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id = :id')
            ->setParameter('id', $id)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }
     */

    //admin

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

    public function saveTrickModel(TrickModel $trickModel): void //test
    {
        $this->getEntityManager()->persist($trickModel);
        $this->getEntityManager()->flush();
    }

    public function updateTrick(TrickModel $trick): void
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
