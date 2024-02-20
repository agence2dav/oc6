<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TrickRepository;
use App\Repository\DesignationRepository;
use App\Repository\TrickDesignationsRepository;
use App\Mapper\TrickDesignationsMapper;
use App\Entity\Trick;

class TrickDesignationsService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private TrickRepository $TrickRepo,
        private DesignationRepository $DesignationRepo,
        private TrickDesignationsRepository $trickDesignationsRepo,
        private TrickDesignationsMapper $trickDesignationsMapper,
        private EntityManagerInterface $manager
    ) {

    }

    public function getAll(): Trick|array
    {
        return $this->DesignationRepo->findAll();
    }

    public function getTricksByDesignation(int $id): Trick|array
    {
        $trickDesignationsModel = $this->trickDesignationsRepo->findByDesignationId($id);
        return $this->trickDesignationsMapper->EntitiesArrayToModels($trickDesignationsModel);
    }




}
