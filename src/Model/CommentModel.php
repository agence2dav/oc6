<?php

declare(strict_types=1);

namespace App\Model;

use DateTimeImmutable;

class CommentModel
{
    private ?int $id = null;
    private ?int $trick = null;
    private ?int $user = null;
    private ?string $content = null;
    private ?\DateTimeInterface $date = null;
    private ?int $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getTrick(): ?int
    {
        return $this->trick;
    }

    public function setTrick(int $trick): static
    {
        $this->trick = $trick;
        return $this;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(int $user): static
    {
        $this->user = $user;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
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
}
