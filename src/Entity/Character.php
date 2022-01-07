<?php

namespace App\Entity;

use App\CharacterGenerator\Enum\FemaleName;
use App\CharacterGenerator\Enum\MaleName;
use App\CharacterGenerator\Enum\Surname;
use App\Form\Enum\Profession;
use App\Form\Enum\Sex;
use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private FemaleName|MaleName|string|null $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private Surname|string|null $surname;

    #[ORM\Column(type: 'string', length: 255)]
    private Profession $profession;

    #[ORM\Column(type: 'integer')]
    private int $age;

    #[ORM\Column(type: 'string', length: 255)]
    private Sex $sex;

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

    #[ORM\OneToMany(mappedBy: 'character', targetEntity: Ability::class)]
    private Collection $abilities;

    #[ORM\OneToMany(mappedBy: 'character', targetEntity: Item::class)]
    private Collection $items;

    public function __construct()
    {
        $this->abilities = new ArrayCollection();
        $this->items = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): FemaleName|MaleName|string|null
    {
        return $this->name;
    }

    public function setName(FemaleName|MaleName|string|null $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): Surname|string|null
    {
        return $this->surname;
    }

    public function setSurname(Surname|string|null $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getProfession(): Profession
    {
        return $this->profession;
    }

    public function setProfession(Profession $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSex(): Sex
    {
        return $this->sex;
    }

    public function setSex(Sex $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function addStrength(int $strength): self
    {
        $this->strength = $this->strength + $strength;

        return $this;
    }

    public function getCondition(): int
    {
        return $this->condition;
    }

    public function setCondition(int $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function addCondition(int $condition): self
    {
        $this->condition = $this->condition + $condition;

        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function addSize(int $size): self
    {
        $this->size = $this->size + $size;

        return $this;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function setDexterity(int $dexterity): self
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function addDexterity(int $dexterity): self
    {
        $this->dexterity = $this->dexterity + $dexterity;

        return $this;
    }

    public function getAppearance(): ?int
    {
        return $this->appearance;
    }

    public function setAppearance(?int $appearance): self
    {
        $this->appearance = $appearance;

        return $this;
    }

    public function addAppearance(?int $appearance): self
    {
        $this->appearance = $this->appearance + $appearance;

        return $this;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function addIntelligence(int $intelligence): self
    {
        $this->intelligence = $this->intelligence + $intelligence;

        return $this;
    }

    public function getEducation(): ?int
    {
        return $this->education;
    }

    public function setEducation(?int $education): self
    {
        $this->education = $education;

        return $this;
    }

    public function addEducation(?int $education): self
    {
        $this->education = $this->education + $education;

        return $this;
    }


    public function getSanity(): ?int
    {
        return $this->sanity;
    }

    public function setSanity(?int $sanity): self
    {
        $this->sanity = $sanity;

        return $this;
    }

    public function addSanity(?int $sanity): self
    {
        $this->sanity = $this->sanity + $sanity;

        return $this;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    public function setPower(int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function addPower(int $power): self
    {
        $this->power = $this->power + $power;

        return $this;
    }

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    public function setHitPoints(int $hitPoints): self
    {
        $this->hitPoints = $hitPoints;

        return $this;
    }

    public function addHitPoints(int $hitPoints): self
    {
        $this->hitPoints = $this->hitPoints + $hitPoints;

        return $this;
    }

    public function getAbilities(): ArrayCollection|Collection
    {
        return $this->abilities;
    }

    public function setAbilities(ArrayCollection|Collection $abilities): self
    {
        $this->abilities = $abilities;

        return $this;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): self
    {
        $this->items = $items;

        return $this;
    }
}
