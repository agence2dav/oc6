<?php

namespace App\Entity;

use App\Repository\TrickTagsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Cat;
use App\Entity\Tag;

#[ORM\Entity(repositoryClass: TrickTagsRepository::class)]
class TrickTags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'tag')]
    private ?Trick $trick = null;

    #[ORM\ManyToOne(inversedBy: 'trickTags')]
    private ?Tag $tag = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTag(): ?Tag
    {
        return $this->tag;
    }

    public function setTag(?Tag $tag): static
    {
        $this->tag = $tag;

        return $this;
    }
}
