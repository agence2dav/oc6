<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DesignationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: DesignationRepository::class)]
#[Broadcast]
class Designation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: TrickDesignations::class, mappedBy: 'designation')]
    private ?Collection $trickDesignations = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function gettrickDesignation(): ?string
    {
        return $this->trickDesignations;
    }

    public function setTrickDesignation(Collection $trickDesignations): static
    {
        $this->trickDesignations = $trickDesignations;
        return $this;
    }
}
