<?php

declare(strict_types=1);

namespace App\Model;

use Doctrine\Common\Collections\Collection;
use App\Entity\TrickTags;
use App\Entity\Trick;

class CatModel
{
    private ?int $id = null;
    private ?string $name = null;
    private ?TrickTags $trickTags = null;
    private ?Trick $trick = null;
    private Collection $tags;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
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

    public function getTags(): Collection
    {
        return $this->tags;
    }

    //added
    public function setTags(Collection $tags): CatModel
    {
        $this->tags = $tags;
        return $this;
    }

    public function getTrickTags(): ?TrickTags
    {
        return $this->trickTags;
    }

    public function setTrickTags(?TrickTags $trickTags): static
    {
        $this->trickTags = $trickTags;
        return $this;
    }

}
