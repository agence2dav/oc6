<?php

declare(strict_types=1);

namespace App\Mapper;

use Doctrine\Common\Collections\Collection;
use App\Model\TrickDesignationsModel;
use App\Entity\Designations;

class TrickDesignationsMapper
{

    //public function EntityToModel(Designations $trickDesignations): DesignationsModel
    public function EntityToModel(object $trickDesignations): TrickDesignationsModel
    {
        $trickDesignationsModel = new TrickDesignationsModel();
        $trickDesignationsModel->setId($trickDesignations->getId());
        $trickDesignationsModel->setDesignation($trickDesignations->getDesignation());
        $trickDesignationsModel->setTrick($trickDesignations->getTrick());
        return $trickDesignationsModel;
    }

    public function EntitiesToModels(Collection $trickDesignationsEntities): array
    {
        $trickDesignationsModels = [];
        foreach ($trickDesignationsEntities as $trickDesignations) {
            $trickDesignationsModels[] = $this->EntityToModel($trickDesignations);
        }
        return $trickDesignationsModels;
    }

    public function EntitiesArrayToModels(array $trickDesignationsEntities): array
    {
        $trickDesignationsModels = [];
        foreach ($trickDesignationsEntities as $trickDesignations) {
            $trickDesignationsModels[] = $this->EntityToModel($trickDesignations);
        }
        return $trickDesignationsModels;
    }

}
