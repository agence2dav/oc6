<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TrickRepository;
use App\Repository\TagRepository;
use App\Repository\TrickTagsRepository;
use App\Mapper\TrickTagsMapper;
use App\Entity\Trick;

class TrickTagsService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private TrickRepository $TrickRepo,
        private TagRepository $TagRepo,
        private TrickTagsRepository $trickTagsRepo,
        private TrickTagsMapper $trickTagsMapper,
        private EntityManagerInterface $manager
    ) {

    }

    public function getAll(): Trick|array
    {
        return $this->TagRepo->findAll();
    }

    public function getTricksByTag(int $id): Trick|array
    {
        $trickTagsModel = $this->trickTagsRepo->findByTagId($id);
        return $this->trickTagsMapper->EntitiesArrayToModels($trickTagsModel);
    }

}
