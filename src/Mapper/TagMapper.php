<?php

declare(strict_types=1);

namespace App\Mapper;

use Doctrine\Common\Collections\Collection;
use App\Model\TagModel;
use App\Entity\Tag;

class TagMapper
{
    public function EntityToModel(object $tagEntity): TagModel
    {
        $tagModel = new TagModel();
        $tagModel->setId($tagEntity->getId());
        $tagModel->setName($tagEntity->getName());
        $tagModel->setTrick($tagEntity->getTrick());
        $tagModel->setCat($tagEntity->getCat());
        return $tagModel;
    }

    public function EntitiesToModels(Collection $tagEntities): array
    {
        $tagModels = [];
        foreach ($tagEntities as $tagEntity) {
            $tagModels[] = $this->EntityToModel($tagEntity);
        }
        return $tagModels;
    }

    public function EntitiesArrayToModels(array $tagEntities): array
    {
        $tagModels = [];
        foreach ($tagEntities as $tagEntity) {
            $tagModels[] = $this->EntityToModel($tagEntity);
        }
        return $tagModels;
    }

}
