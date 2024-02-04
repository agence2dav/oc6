<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TrickRepository;
use App\Repository\DesignationRepository;
use App\Entity\Trick;

class TrickDesignationsService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private TrickRepository $TrickRepo,
        private DesignationRepository $DedignationRepo,
        private EntityManagerInterface $manager
    ) {

    }

    public function getAll(): Trick|array
    {
        return $this->DedignationRepo->findAll();
    }


}
