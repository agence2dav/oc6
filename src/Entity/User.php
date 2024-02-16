<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\UX\Turbo\Attribute\Broadcast;
use App\Repository\UserRepository;
use App\Entity\Trick;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[Broadcast]
#[UniqueEntity(fields: ['username'], message: 'Cet e-mail est déjà utilisé')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        /* */
        $metadata->addPropertyConstraint('username', new Assert\Required([
            new Assert\NotBlank(),
            new Assert\Length([
                'min' => 2,
                'maxMessage' => 'Nom d\'utilisateur trop court',
            ]),
            new Assert\Length([
                'max' => 100,
                'maxMessage' => 'Nom d\'utilisateur trop long',
            ]),
        ]));

        $metadata->addPropertyConstraint('email', new Assert\Required([
            new Assert\NotBlank(),
            new Assert\Email(),
        ]));
        $metadata->addGetterConstraint('passwordSafe', new Assert\IsTrue([
            'message' => 'Les mots de passes ne correspondent pas',
        ]));

    }

    public function isPasswordSafe(): bool
    {
        return $this->plainPassword === $this->confirmPassword;
    }

    public function __construct()
    {
        $this->tricks = new ArrayCollection();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;
    private ?string $plainPassword = null;
    private ?string $confirmPassword = null;

    #[ORM\Column]
    private ?array $roles = [];

    //relations

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Trick::class)]
    private Collection $tricks;

    #[ORM\Column(type: 'boolean')]
    private ?bool $isVerified = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resetToken = null;

    //functions

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    //identifier that represents this user
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
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

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): static
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    public function setConfirmPassword(string $confirmPassword): static
    {
        $this->confirmPassword = $confirmPassword;
        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    //relations functions

    public function getUser(): ?string
    {
        return (string) $this->username;
    }

    public function setUser(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getTricks(): Collection
    {
        return $this->tricks;
    }

    public function addTrick(Trick $trick): static
    {
        if (!$this->tricks->contains($trick)) {
            $this->tricks->add($trick);
            $trick->setUser($this);
        }
        return $this;
    }

    public function removeTrick(Trick $trick): static
    {
        if ($this->tricks->removeElement($trick)) {
            // set the owning side to null (unless already changed)
            if ($trick->getUser() === $this) {
                $trick->setUser(null);
            }
        }
        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    public function setResetToken(?string $resetToken): static
    {
        $this->resetToken = $resetToken;
        return $this;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

}
