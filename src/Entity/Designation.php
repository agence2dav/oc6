<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DesignationRepository;
use Doctrine\Common\Collections\ArrayCollection;
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

    #[ORM\OneToMany(mappedBy: 'designation', targetEntity: TrickDesignations::class)]
    private Collection $TrickDesignations;

    public function __construct()
    {
        $this->TrickDesignations = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, TrickDesignations>
     */
    public function getTrickDesignations(): Collection
    {
        return $this->TrickDesignations;
    }

    public function addTrickDesignations(TrickDesignations $TrickDesignations): static
    {
        if (!$this->TrickDesignations->contains($TrickDesignations)) {
            $this->TrickDesignations->add($TrickDesignations);
            $TrickDesignations->setDesignation($this);
        }

        return $this;
    }

    public function removeTrickDesignations(TrickDesignations $TrickDesignations): static
    {
        if ($this->TrickDesignations->removeElement($TrickDesignations)) {
            // set the owning side to null (unless already changed)
            if ($TrickDesignations->getDesignation() === $this) {
                $TrickDesignations->setDesignation(null);
            }
        }

        return $this;
    }

}
