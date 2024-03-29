<?php

declare(strict_types=1);

namespace App\Mapper;

use Doctrine\Common\Collections\Collection;
use App\Model\TrickTagsModel;

class TrickTagsMapper
{

    public function EntityToModel(object $trickTags): TrickTagsModel
    {
        $trickTagsModel = new TrickTagsModel();
        $trickTagsModel->setId($trickTags->getId());
        $trickTagsModel->setTag($trickTags->getTag());
        $trickTagsModel->setCat($trickTags->getTag()->getCat());
        $trickTagsModel->setTrick($trickTags->getTrick());
        return $trickTagsModel;
    }

    public function EntitiesToModels(Collection $trickTagsEntities): array
    {
        $trickTagsModels = [];
        foreach ($trickTagsEntities as $trickTags) {
            $trickTagsModels[] = $this->EntityToModel($trickTags);
        }
        return $trickTagsModels;
    }

    public function EntitiesArrayToModels(array $trickTagsEntities): array
    {
        $trickTagsModels = [];
        foreach ($trickTagsEntities as $trickTags) {
            $trickTagsModels[] = $this->EntityToModel($trickTags);
        }
        return $trickTagsModels;
    }

}
