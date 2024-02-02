<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Entity\Comment;
use App\Model\CommentModel;
use App\Entity\Trick;

class CommentMapper
{

    /**
     * @var CommentEntity[] $commentEntity
     * 
     * */
    public function EntitiesToModels(array $commentEntities)
    {
        $commentModels = [];
        foreach ($commentEntities as $commentEntity) {
            $commentModel = new CommentModel();
            $commentModel->setId($commentEntity->getId());
            $commentModels[] = $commentModel;
        }
        return $commentModels;
    }

    public function EntityToModel(Trick $trick)
    {
        $commentModel = new CommentModel();
        $commentModel->setId($commentEntity->getId());
        return $commentModel;
    }


}
