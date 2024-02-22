<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TrickRepository;
use App\Repository\TrickTagRepository;
use App\Repository\TagRepository;
use App\Mapper\TagMapper;
use App\Entity\Trick;

class TagService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private TrickRepository $TrickRepo,
        private TagRepository $TagRepo,
        private TagRepository $tagsRepo,
        private TagMapper $tagsMapper,
        private EntityManagerInterface $manager
    ) {

    }

    public function getAll(): Trick|array
    {
        return $this->TagRepo->findAll();
    }

    public function getTricksByTag(int $id): Trick|array
    {
        $tagsModel = $this->tagsRepo->findByTagId($id);
        return $this->tagsMapper->EntitiesArrayToModels($tagsModel);
    }

}
