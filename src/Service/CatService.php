<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\TrickRepository;
use App\Repository\TrickCatRepository;
use App\Repository\CatRepository;
use App\Repository\TagRepository;
use App\Mapper\CatMapper;
use App\Entity\Trick;

class CatService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private TrickRepository $trickRepo,
        private CatRepository $catRepo,
        //private TagRepository $tagRepo,
        private CatMapper $catMapper,
        private EntityManagerInterface $manager
    ) {

    }

    public function getAll(): Collection|array
    {
        $catModel = $this->catRepo->findAll();
        return $this->catMapper->EntitiesArrayToModels($catModel);
    }

    public function getTricksByCat(int $id): Trick|array
    {
        $catsModel = $this->catRepo->findByCatId($id);
        return $this->catMapper->EntitiesArrayToModels($catsModel);
    }

}
