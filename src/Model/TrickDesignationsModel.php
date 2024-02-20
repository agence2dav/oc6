<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\Trick;
use App\Entity\Designation;
use App\Entity\TrickDesignations;

class TrickDesignationsModel
{
    private ?int $id = null;
    private ?Designation $designation = null;
    private ?TrickDesignations $trickDesignations = null;
    private ?Trick $trick = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getDesignation(): ?Designation
    {
        return $this->designation;
    }

    public function setDesignation(?Designation $designation): static
    {
        $this->designation = $designation;
        return $this;
    }

    public function getTrickDesignations(): ?TrickDesignations
    {
        return $this->trickDesignations;
    }

    public function setTrickDesignations(?TrickDesignations $trickDesignations): static
    {
        $this->trickDesignations = $trickDesignations;
        return $this;
    }

    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    public function setTrick(?Trick $trick): static
    {
        $this->trick = $trick;
        return $this;
    }

}
