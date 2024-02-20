<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\Cat;
use App\Entity\Tag;
use App\Entity\Trick;
use App\Entity\TrickTags;

class TrickTagsModel
{
    private ?int $id = null;
    private ?Tag $tag = null;
    private ?Cat $cat = null;
    private ?TrickTags $trickTags = null;
    private ?Trick $trick = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
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

    public function getTrickTags(): ?TrickTags
    {
        return $this->trickTags;
    }

    public function setTrickTags(?TrickTags $trickTags): static
    {
        $this->trickTags = $trickTags;
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

    public function getCat(): ?Trick
    {
        return $this->cat;
    }

    public function setCat(?Cat $cat): static
    {
        $this->cat = $cat;
        return $this;
    }

}
