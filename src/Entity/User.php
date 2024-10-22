<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null; // Utilisation de votre colonne "role"

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Recipe::class)]
    private Collection $recipes;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
    }

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

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Implémentation de la méthode getRoles() requise par UserInterface
     */
    public function getRoles(): array
    {
        // Convertit la colonne "role" en un tableau attendu par Symfony
        return [$this->role];
    }

    /**
     * Implémentation de la méthode eraseCredentials() requise par UserInterface
     */
    public function eraseCredentials(): void
    {
        // Effacer toutes les informations sensibles ici, si vous en stockez temporairement
    }

    /**
     * Implémentation de la méthode getUserIdentifier() pour la connexion
     */
    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    // Méthode requise par PasswordAuthenticatedUserInterface
    public function getSalt(): ?string
    {
        return null; // Pas nécessaire si bcrypt ou argon2 est utilisé
    }
}

