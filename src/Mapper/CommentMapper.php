<?php

declare(strict_types=1);

namespace App\Mapper;

use Doctrine\Common\Collections\Collection;
use App\Model\CommentModel;
use App\Entity\Comment;

class CommentMapper
{

    //public function EntityToModel(Comment $commentEntity): CommentModel
    public function EntityToModel(object $commentEntity): CommentModel
    {
        $commentModel = new CommentModel();
        $commentModel->setId($commentEntity->getId());
        $commentModel->setUsername($commentEntity->getUser()->getUser());
        $commentModel->setDate($commentEntity->getDate());
        $commentModel->setContent($commentEntity->getContent());
        //dump($commentModel);
        return $commentModel;
    }

    public function EntitiesToModels(Collection $commentEntities): array
    {
        $commentModels = [];
        foreach ($commentEntities as $commentEntity) {
            $commentModels[] = $this->EntityToModel($commentEntity);
        }
        return $commentModels;
    }

}
