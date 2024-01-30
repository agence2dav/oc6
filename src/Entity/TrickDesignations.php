<?php

namespace App\Entity;

use App\Repository\TrickDesignationsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;
use App\Entity\Trick;
use App\Entity\Designation;

#[ORM\Entity(repositoryClass: TrickDesignationsRepository::class)]
#[Broadcast]
class TrickDesignations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    //#[ORM\Column]
    #[ORM\ManyToOne(targetEntity: Trick::class, inversedBy: 'trick_designations')]
    private ?int $trickId = null;

    //#[ORM\Column]
    #[ORM\ManyToOne(targetEntity: Designation::class, inversedBy: 'trick_designations')]
    private ?int $designationId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrickId(): ?int
    {
        return $this->trickId;
    }

    public function setTrickId(int $trickId): static
    {
        $this->trickId = $trickId;

        return $this;
    }

    public function getDesignationId(): ?int
    {
        return $this->designationId;
    }

    public function setDesignationId(int $designationId): static
    {
        $this->designationId = $designationId;

        return $this;
    }
}
