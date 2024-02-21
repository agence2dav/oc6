<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Collection;
use App\Repository\TrickRepository;
use App\Repository\TagRepository;
use App\Repository\CatRepository;
use App\Repository\TrickTagsRepository;
use App\Mapper\TrickTagsMapper;
use App\Entity\TrickTags;
use App\Entity\Trick;
use App\Entity\Cat;
use App\Entity\Tag;

class TrickTagsService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private TrickRepository $TrickRepo,
        private TagRepository $tagRepo,
        private CatRepository $catRepo,
        private TrickTagsRepository $trickTagsRepo,
        private TrickTagsMapper $trickTagsMapper,
        private EntityManagerInterface $manager
    ) {

    }

    public function saveTrickTag(
        Trick $trick,
        //Collection $trickTags,
        //Cat $cat,
        //Tag $tag,
        string $tagId,
    ): void {
        echo $tagId;
        $trickTags = new TrickTags();
        $tag = $this->tagRepo->findBy(['id' => $tagId])[0];
        //dd($tag);
        $cat = $tag->getCat();
        $trickTags->setTrick($trick);
        $trickTags->setCat($cat);
        $trickTags->setTag($tag);
        $this->trickTagsRepo->saveTrickTags($trickTags);

    }

    public function getAll(): Trick|array
    {
        return $this->tagRepo->findAll();
    }

    public function getAllCatTags(): Trick|array
    {
        $cats = $this->catRepo->findAll();
        $catTags = [];
        foreach ($cats as $cat) {
            $catTags[$cat->getName()] = $cat->getTags();
        }
        return $catTags;
    }

    public function getTricksByTag(int $id): Trick|array
    {
        //$trickTagsModel = $this->trickTagsRepo->findByTagId($id);
        $trickTagsModel = $this->trickTagsRepo->findBy(['tag' => $id], ['id' => 'ASC']);
        return $this->trickTagsMapper->EntitiesArrayToModels($trickTagsModel);
    }

}
