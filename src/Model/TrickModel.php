<?php

declare(strict_types=1);

namespace App\Model;

use DateTimeImmutable;
use DateTimeInterface;
use DateTime;
use App\Entity\User;
use App\Entity\TrickDesignations;
use App\Entity\Comment;
use Doctrine\Common\Collections\Collection;

class TrickModel
{
    private readonly int $id;
    private readonly string $username;
    private readonly string $title;
    private readonly string $slug;
    private readonly string $content;
    private readonly string $image;
    private readonly int $status;
    private readonly DateTime $createdAt;
    private readonly DateTime $updatedAt;
    private readonly User $user;
    private readonly array $comments;
    private readonly Collection $trickDesignations;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;
        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
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

    public function getTrickDesignations(): Collection
    {
        return $this->trickDesignations;
    }

    public function setComments(array $comments): static
    {
        $this->comments = $comments;
        return $this;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

}
