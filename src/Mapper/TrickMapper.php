<?php

declare(strict_types=1);

namespace App\Mapper;

use DateTimeInterface;
use DateTimeImmutable;
use App\Mapper\CommentMapper;
use App\Model\TrickModel;
use App\Entity\Trick;

class TrickMapper
{
    private static $instance;

    public function __construct(
        private CommentMapper $commentMapper
    ) {

    }

    public function EntityToModel(Trick $trickEntity): TrickModel
    {
        $trickModel = new TrickModel();
        $trickModel->setId($trickEntity->getId());
        //$trickModel->setUser($trickEntity->getUser());
        $trickModel->setUsername($trickEntity->getUser()->getUser());
        $trickModel->setCreatedAt($trickEntity->getCreatedAt());
        $trickModel->setUpdatedAt($trickEntity->getUpdatedAt());
        $trickModel->setTitle($trickEntity->getTitle());
        $trickModel->setSlug($trickEntity->getSlug());
        $trickModel->setImage($trickEntity->getImage());
        $trickModel->setStatus($trickEntity->getStatus());
        $trickModel->setContent($trickEntity->getContent());
        $trickModel->setComments($this->commentMapper->EntitiesToModels($trickEntity->getComments()));
        return $trickModel;
    }

}
