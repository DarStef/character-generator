<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $surname;

    #[ORM\Column(type: 'string', length: 255)]
    private string $profession;

    #[ORM\Column(type: 'integer')]
    private int $age;

    #[ORM\Column(type: 'string', length: 255)]
    private string $sex;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'integer')]
    private int $strength;

    #[ORM\Column(type: 'integer')]
    private int $condition;

    #[ORM\Column(type: 'integer')]
    private int $size;

    #[ORM\Column(type: 'integer')]
    private int $dexterity;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $appearance;

    #[ORM\Column(type: 'integer')]
    private int $intelligence;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $education;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sanity;

    #[ORM\Column(type: 'integer')]
    private int $power;

    #[ORM\Column(type: 'integer')]
    private int $hitPoints;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getProfession(): string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): void
    {
        $this->profession = $profession;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function getCondition(): int
    {
        return $this->condition;
    }

    public function setCondition(int $condition): void
    {
        $this->condition = $condition;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function setDexterity(int $dexterity): void
    {
        $this->dexterity = $dexterity;
    }

    public function getAppearance(): ?int
    {
        return $this->appearance;
    }

    public function setAppearance(?int $appearance): void
    {
        $this->appearance = $appearance;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): void
    {
        $this->intelligence = $intelligence;
    }

    public function getEducation(): ?int
    {
        return $this->education;
    }

    public function setEducation(?int $education): void
    {
        $this->education = $education;
    }

    public function getSanity(): ?int
    {
        return $this->sanity;
    }

    public function setSanity(?int $sanity): void
    {
        $this->sanity = $sanity;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    public function setPower(int $power): void
    {
        $this->power = $power;
    }

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    public function setHitPoints(int $hitPoints): void
    {
        $this->hitPoints = $hitPoints;
    }
}
