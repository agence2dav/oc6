<?php

declare(strict_types=1);

namespace App\Mapper;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\PersistentCollection;
use Doctrine\Common\Collections\Collection\TKey;
use App\Entity\Comment;
use App\Model\CommentModel;
use App\Entity\Trick;


class CommentMapper
{

    /**
     * @var CommentEntity[] $commentEntity
     * 
     * */

    public function EntityToModel(object $commentEntity): CommentModel
    {
        $commentModel = new CommentModel();
        /* $map = ['Id','User','Content','Date'];
        foreach ($map as $var) {
            $set='set'.$var; $get='get'.$var;
            $commentModel->$set($commentEntity->$get());
        }*/
        $commentModel->setId($commentEntity->getId());
        $commentModel->setUser($commentEntity->getUser());
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
