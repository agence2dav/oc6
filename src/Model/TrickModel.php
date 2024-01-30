<?php

declare(strict_types=1);

namespace App\Model;

use DateTimeImmutable;

class TrickModel
{
    private readonly int $id;
    private readonly string $title;
    private readonly string $content;
    private readonly string $image;
    private readonly int $status;
    private readonly DateTimeImmutable $createdAt;
    private readonly DateTimeImmutable $updatedAt;
    private readonly int $userid;
    private readonly int $designation;
    private readonly array $results;
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function getUserid(): int
    {
        return $this->userid;
    }

    public function getDesignation(): int
    {
        return $this->designation;
    }

}
