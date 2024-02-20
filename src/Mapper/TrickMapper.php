<?php

declare(strict_types=1);

namespace App\Mapper;

use DateTimeInterface;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use App\Mapper\CommentMapper;
use App\Mapper\MediaMapper;
use App\Model\TrickModel;
use App\Entity\Trick;

class TrickMapper
{
    private static $instance;

    public function __construct(
        private CommentMapper $commentMapper,
        private TrickTagsMapper $trickTagsMapper,
        //private TagMapper $tagMapper,
        private MediaMapper $mediaMapper
    ) {

    }

    public function EntityToModel(Trick $trickEntity): TrickModel
    {
        $trickModel = new TrickModel();
        $trickModel->setId($trickEntity->getId());
        //$trickModel->setUser($trickEntity->getUser());
        $trickModel->setUsername($trickEntity->getUser()->getUsername());
        $trickModel->setCreatedAt($trickEntity->getCreatedAt());
        $trickModel->setUpdatedAt($trickEntity->getUpdatedAt());
        $trickModel->setTitle($trickEntity->getTitle());
        $trickModel->setSlug($trickEntity->getSlug());
        $trickModel->setImage($trickEntity->getImage());
        $trickModel->setStatus($trickEntity->getStatus());
        $trickModel->setContent($trickEntity->getContent());
        $trickModel->setComments($this->commentMapper->EntitiesToModels($trickEntity->getComments()));
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
