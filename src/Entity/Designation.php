<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DesignationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

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

    #[ORM\OneToOne(targetEntity: TrickDesignations::class, inversedBy: 'designation')]
    #[ORM\JoinColumn(nullable: false)]
    private ?string $trickDesignations = null;

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

    public function setTrickDesignation($trickDesignations): static
    {
        $this->trickDesignations = $trickDesignations;
        return $this;
    }
}
