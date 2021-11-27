<?php declare(strict_types=1);

namespace App\Entity;

use App\Repository\SessionRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private string $token;

    #[ORM\Column(type: "datetime_immutable", nullable: true)]
    private DateTimeImmutable $tokenValidTo;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private User $user;


    public function getId(): int
    {
        return $this->id;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getTokenValidTo(): ?DateTimeImmutable
    {
        return $this->tokenValidTo;
    }

    public function setTokenValidTo(?DateTimeImmutable $tokenValidTo): void
    {
        $this->tokenValidTo = $tokenValidTo;
    }

}