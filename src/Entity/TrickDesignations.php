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

    #[ORM\ManyToOne(inversedBy: 'trickDesignations')]
    private ?Trick $trick = null;

    #[ORM\ManyToOne(inversedBy: 'TrickDesignations')]
    private ?Designation $designation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    //relations functions

    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    public function setTrick(?Trick $trick): static
    {
        $this->trick = $trick;

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

}
