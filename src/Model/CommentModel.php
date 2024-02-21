<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;
use DateTimeInterface;
use App\Entity\User;
use App\Entity\Trick;

class CommentModel
{
    private ?int $id = null;
    private ?Trick $trick = null;
    private ?User $user = null;
    private ?string $username = null;
    private ?string $content = null;
    private ?DateTime $date = null;
    private ?int $status = null;
    private ?string $trickSlug = null;
    private ?string $trickTitle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getTrickSlug(): ?string
    {
        return $this->trickSlug;
    }

    public function setTrickSlug(?string $trickSlug): static
    {
        $this->trickSlug = $trickSlug;
        return $this;
    }

    public function getTrickTitle(): ?string
    {
        return $this->trickTitle;
    }

    public function setTrickTitle(?string $trickTitle): static
    {
        $this->trickTitle = $trickTitle;
        return $this;
    }

}
