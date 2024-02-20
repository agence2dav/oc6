<?php

declare(strict_types=1);

namespace App\Mapper;

use Doctrine\Common\Collections\Collection;
use App\Model\DesignationModel;
use App\Entity\Designations;

class DesignationMapper
{

    //public function EntityToModel(Designations $designation): DesignationModel
    public function EntityToModel(object $designation): DesignationModel
    {
        $designationModel = new DesignationModel();
        $designationModel->setId($designation->getId());
        $designationModel->setTrickDesignations($designation->getTrickDesignations());
        return $designationModel;
    }

    public function EntitiesToModels(Collection $designationEntities): array
    {
        $designationModels = [];
        foreach ($designationEntities as $designation) {
            $designationModels[] = $this->EntityToModel($designation);
        }
        return $designationModels;
    }

    public function EntitiesArrayToModels(array $designationEntities): array
    {
        $designationModels = [];
        foreach ($designationEntities as $designation) {
            $designationModels[] = $this->EntityToModel($designation);
        }
        return $designationModels;
    }

}
