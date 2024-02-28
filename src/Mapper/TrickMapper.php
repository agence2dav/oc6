<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Mapper\CommentMapper;
use App\Mapper\MediaMapper;
use App\Mapper\TrickTagsMapper;
use App\Mapper\TagMapper;
use App\Model\TrickModel;
use App\Entity\Trick;

class TrickMapper
{
    public function __construct(
        private CommentMapper $commentMapper,
        private TrickTagsMapper $trickTagsMapper,
        private MediaMapper $mediaMapper,
        private TagMapper $tagMapper,
    ) {
    }

    public function EntityToModel(Trick $trickEntity): TrickModel
    {
        $trickModel = new TrickModel();
        $trickModel->setId($trickEntity->getId());
        $trickModel->setUsername($trickEntity->getUser()->getUsername());
        $trickModel->setCreatedAt($trickEntity->getCreatedAt());
        $trickModel->setUpdatedAt($trickEntity->getUpdatedAt());
        $trickModel->setTitle($trickEntity->getTitle());
        $trickModel->setSlug($trickEntity->getSlug());
        $trickModel->setImage($trickEntity->getImage());
        $trickModel->setStatus($trickEntity->getStatus());
        $trickModel->setContent($trickEntity->getContent());
        $trickModel->setMedia($this->mediaMapper->EntitiesToModels($trickEntity->getMedia()));
        $trickModel->setTrickTags($this->trickTagsMapper->EntitiesToModels($trickEntity->getTrickTags()));
        return $trickModel;
    }

    public function EntitiesToModels(array $trickEntities): array
    {
        $trickModels = [];
        foreach ($trickEntities as $trickEntity) {
            $trickModels[] = $this->EntityToModel($trickEntity);
        }
        return $trickModels;
    }

}
