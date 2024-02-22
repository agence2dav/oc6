<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\TrickTags;
use App\Entity\Trick;
use App\Entity\Cat;

class TagModel
{
    private ?int $id = null;
    private ?string $name = null;
    private ?TrickTags $trickTags = null;
    private ?Trick $trick = null;
    private ?Cat $cat = null;

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

    public function getCat(): ?Cat
    {
        return $this->cat;
    }

    public function setCat(?Cat $cat): static
    {
        $this->cat = $cat;
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
