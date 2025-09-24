<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $lastLogin = null;


    public function __construct()
{
    $this->createdAt = new \DateTimeImmutable();
}


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }


    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }
// Retourne l'identifiant de l'utilisateur (ici le pseudo)
    public function getUserIdentifier(): string
    {
        return $this->pseudo;
    }

// Retourne les rôles (nécessaire, même si tu n'en utilises pas)
    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

// Nécessaire pour UserInterface
    public function eraseCredentials(): void
    {
        // Si tu stockes temporairement des infos sensibles, tu peux les effacer ici
    }

// Pour PasswordAuthenticatedUserInterface
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeImmutable
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeImmutable $lastLogin): static
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }
}
