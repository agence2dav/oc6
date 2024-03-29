<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TrickRepository;
use App\Repository\TagRepository;
use App\Repository\CatRepository;
use App\Repository\TrickTagsRepository;
use App\Mapper\TrickTagsMapper;
use App\Entity\TrickTags;
use App\Entity\Trick;

class TrickTagsService
{

    public function __construct(
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
        string $tagId,
    ): void {
        $trickTags = new TrickTags();
        $tag = $this->tagRepo->findOneBy(['id' => $tagId]);
        if ($tag) {
            $cat = $tag->getCat();
            $trickTags->setTrick($trick);
            $trickTags->setCat($cat);
            $trickTags->setTag($tag);
            $this->trickTagsRepo->saveTrickTags($trickTags);
        }
    }

    public function getTricksByTag(int $id): Trick|array
    {
        $trickTagsModel = $this->trickTagsRepo->findBy(['tag' => $id], ['id' => 'ASC']);
        return $this->trickTagsMapper->EntitiesArrayToModels($trickTagsModel);
    }

}
