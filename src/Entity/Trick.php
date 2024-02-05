<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TrickRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Type;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\TrickDesignations;
use App\Entity\Comment;
use App\Entity\User;

#[ORM\Entity(repositoryClass: TrickRepository::class)]
#[Broadcast]
class Trick
{

    public function __construct()
    {
        //this->notes = new ArrayCollection();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('title', new NotBlank());
        $metadata->addPropertyConstraint('content', new NotBlank());
        $metadata->addPropertyConstraint('image', new NotBlank());
        /*
        $metadata->addPropertyConstraint('createdAt', new NotBlank());
        $metadata->addPropertyConstraint(
            'createdAt',
            new Type(\DateTimeInterface::class)
        );*/
    }


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'trick')]
    #[ORM\JoinColumn(nullable: false)]
    private ?int $user = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le titre doit être spécifié')]
    #[Assert\Length(
        min: 5,
        minMessage: 'Le titre doit faire plus de {{ limit }} caractères',
        max: 50,
        maxMessage: 'Longueur max : limit }} caractères'
    )]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $updatedAt = null;

    //relations

    //#[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'tricks', cascade:['persist'], fetch: 'EAGER')]
    //#[ORM\OneToMany(mappedBy: 'trick', targetEntity: Comment::class, orphanRemoval: true)]

    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'trick')]
    private ?Collection $comment = null;

    #[ORM\OneToMany(targetEntity: TrickDesignations::class, mappedBy: 'trick')]
    private ?Collection $designation = null;

    //get-set

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(int $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(Collection $comment): static
    {
        $this->comment = $comment;
        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(Collection $designation): static
    {
        $this->designation = $designation;
        return $this;
    }

}
