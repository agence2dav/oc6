<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\TrickDesignations;
use App\Entity\Designation;

class DesignationModel
{
    private ?int $id = null;
    private ?string $type = null;
    private ?string $name = null;
    private ?Designation $designation = null;
    private ?TrickDesignations $trickDesignations = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }
    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
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

}
