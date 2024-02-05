<?php

declare(strict_types=1);

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

    #[ORM\Column]
    #[ORM\ManyToOne(targetEntity: Trick::class, inversedBy: 'trickDesignations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?int $trick = null;

    #[ORM\Column]
    #[ORM\ManyToOne(targetEntity: Designation::class, inversedBy: 'trickDesignations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?int $designation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrick(): ?int
    {
        return $this->trick;
    }

    public function setTrick($trick): static
    {
        $this->trick = $trick;
        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation($designation): static
    {
        $this->designation = $designation;
        return $this;
    }

}
