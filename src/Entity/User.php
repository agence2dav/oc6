<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;
use App\Entity\Comment;
use App\Entity\Trick;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[Broadcast]
class User
{

    public function __construct()
    {
        //$this->notes = new ArrayCollection();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private ?int $role = null;

    #[ORM\OneToMany(targetEntity: Trick::class, mappedBy: 'user')]
    private ?int $trick = null;

    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'user')]
    private ?int $comment = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(int $role): static
    {
        $this->role = $role;
        return $this;
    }

    public function getTrick(): ?int
    {
        return $this->trick;
    }

    public function setTrick(int $trick): static
    {
        $this->role = $trick;
        return $this;
    }

    public function getComment(): ?int
    {
        return $this->comment;
    }

    public function setComment(int $comment): static
    {
        $this->role = $comment;
        return $this;
    }
}
