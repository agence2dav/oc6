<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TrickTags;
use App\Entity\Cat;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'tag')]
    private ?Cat $cat = null;

    #[ORM\OneToMany(targetEntity: TrickTags::class, mappedBy: 'tag')]
    private Collection $trickTags;

    public function __construct()
    {
        $this->trickTags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCat(): ?Cat
    {
        return $this->cat;
    }

    public function setCat(?Cat $cat): static
    {
        $this->cat = $cat;
        return $this;
    }

    public function getTrickTags(): Collection
    {
        return $this->trickTags;
    }

    public function addTrickTag(TrickTags $trickTag): static
    {
        if (!$this->trickTags->contains($trickTag)) {
            $this->trickTags->add($trickTag);
            $trickTag->setTag($this);
        }
        return $this;
    }

    public function removeTrickTag(TrickTags $trickTag): static
    {
        if ($this->trickTags->removeElement($trickTag)) {
            // set the owning side to null (unless already changed)
            if ($trickTag->getTag() === $this) {
                $trickTag->setTag(null);
            }
        }
        return $this;
    }

}
