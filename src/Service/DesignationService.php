<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TrickRepository;
use App\Repository\TrickDesignationsRepository;
use App\Entity\Trick;

class DesignationsService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private TrickRepository $TrickRepo,
        private TrickDesignationsRepository $TrickDedignationRepo,
        private EntityManagerInterface $manager
    ) {

    }

    public function getAll(): Trick|array
    {
        return $this->TrickDedignationRepo->findAll();
    }


}
