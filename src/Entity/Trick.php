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
use DateTimeInterface;
use DateTimeImmutable;
use DateTime;

#[ORM\Entity(repositoryClass: TrickRepository::class)]
#[Broadcast]
class Trick
{

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->trickDesignations = new ArrayCollection();
    }

    //https://symfony.com/doc/current/reference/constraints/Collection.html
    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('title', new NotBlank());
        $metadata->addPropertyConstraint('content', new NotBlank());
        $metadata->addPropertyConstraint('image', new NotBlank());
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    //#[ORM\Column]
    //private ?int $userId = null;

    #[ORM\Column(length: 255)]
    /*#[Assert\NotBlank(message: 'Le titre doit être spécifié')]
     #[Assert\Length(
        min: 5,
        minMessage: 'Le titre doit faire plus de {{ limit }} caractères',
        max: 50,
        maxMessage: 'Longueur max : {{ limit }} caractères'
    )]*/
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTime $createdAt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTime $updatedAt = null;

    //relations

    #[ORM\OneToMany(mappedBy: 'trick', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comments;

    #[ORM\ManyToOne(inversedBy: 'trick')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'trick', targetEntity: TrickDesignations::class)]
    private Collection $trickDesignations;

    //get-set

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
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

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    //relations functions

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setTrick($this);
        }
        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getTrick() === $this) {
                $comment->setTrick(null);
            }
        }
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

    public function getTrickDesignations(): Collection
    {
        return $this->trickDesignations;
    }

    public function addTrickDesignation(TrickDesignations $trickDesignation): static
    {
        if (!$this->trickDesignations->contains($trickDesignation)) {
            $this->trickDesignations->add($trickDesignation);
            $trickDesignation->setTrick($this);
        }
        return $this;
    }

    public function removeTrickDesignation(TrickDesignations $trickDesignation): static
    {
        if ($this->trickDesignations->removeElement($trickDesignation)) {
            // set the owning side to null (unless already changed)
            if ($trickDesignation->getTrick() === $this) {
                $trickDesignation->setTrick(null);
            }
        }
        return $this;
    }

}
