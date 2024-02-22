<?php

namespace App\Repository;

use App\Entity\MediaType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MediaType>
 *
 * @method MediaType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaType[]    findAll()
 * @method MediaType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaType::class);
    }

}
