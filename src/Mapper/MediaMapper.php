<?php

declare(strict_types=1);

namespace App\Mapper;

use Doctrine\Common\Collections\Collection;
use App\Model\MediaModel;
use App\Entity\Media;

class MediaMapper
{

    //public function EntityToModel(Media $mediaEntity): MediaModel
    public function EntityToModel(object $mediaEntity): MediaModel
    {
        $mediaModel = new MediaModel();
        $mediaModel->setId($mediaEntity->getId());
        $mediaModel->setFilename($mediaEntity->getFilename());
        $mediaModel->setTrick($mediaEntity->getTrick());
        return $mediaModel;
    }

    public function EntitiesToModels(Collection $mediaEntities): array
    {
        $mediaModels = [];
        foreach ($mediaEntities as $mediaEntity) {
            $mediaModels[] = $this->EntityToModel($mediaEntity);
        }
        return $mediaModels;
    }

    public function EntitiesArrayToModels(array $mediaEntities): array
    {
        $mediaModels = [];
        foreach ($mediaEntities as $mediaEntity) {
            $mediaModels[] = $this->EntityToModel($mediaEntity);
        }
        return $mediaModels;
    }

}
