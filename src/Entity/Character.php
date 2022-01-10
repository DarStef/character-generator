<?php

namespace App\Entity;

use App\CharacterGenerator\Enum\FemaleName;
use App\CharacterGenerator\Enum\MaleName;
use App\CharacterGenerator\Enum\Surname;
use App\Form\Enum\Sex;
use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;


#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character //implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private FemaleName|MaleName|string|null $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private Surname|string|null $surname;

    #[ORM\Column(type: 'integer')]
    private int $age;

    #[ORM\Column(type: Sex::class)]
    private ?Sex $sex;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'integer')]
    private int $strength;

    #[ORM\Column(type: 'integer')]
    private int $characterCondition;

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

    #[ORM\ManyToOne(targetEntity: Profession::class)]
    #[ORM\JoinColumn(name: 'profession_id', referencedColumnName: 'id')]
    private ?Profession $profession = null;

    #[ORM\OneToMany(mappedBy: 'character', targetEntity: CharacterSkill::class, cascade: ['persist'])]
    private Collection $skills;

    #[ORM\OneToMany(mappedBy: 'character', targetEntity: Item::class)]
    private Collection $items;


    public function __construct()
    {
        $this->skills = new ArrayCollection();
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

    public function getProfession(): ?Profession
    {
        return $this->profession;
    }

    public function setProfession(?Profession $profession): self
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

    public function getCharacterCondition(): int
    {
        return $this->characterCondition;
    }

    public function setCharacterCondition(int $characterCondition): self
    {
        $this->characterCondition = $characterCondition;

        return $this;
    }

    public function addCondition(int $condition): self
    {
        $this->characterCondition = $this->characterCondition + $condition;

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

    public function getSkills(): ArrayCollection|Collection
    {
        return $this->skills;
    }

    public function setSkills(ArrayCollection|Collection $skills): self
    {
        $this->skills = $skills;

        return $this;
    }

    public function addSkill(CharacterSkill $skill): self
    {
        if ($this->skills->contains($skill)) {
            return $this;
        }
        $skill->setCharacter($this);
        $this->skills->add($skill);
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

//    public function jsonSerialize(): array
//    {
//        return [
//          'id' => $this->id,
//            'name' => $this->name,
//            'surname' => $this->surname,
//            'age' => $this->age,
//            'sex' => $this->sex,
//            'description' => $this->description,
//            'strength' => $this->strength,
//            'condition' => $this->characterCondition,
//            'size' => $this->size,
//            'dexterity' => $this->dexterity,
//            'appearance' => $this->appearance,
//            'intelligence' => $this->intelligence,
//            'education' => $this->education,
//            'sanity' => $this->sanity,
//            'power' => $this->power,
//            'hit_points' => $this->hitPoints,
//            'profession' => $this->profession->getName(),
//            'skills' => $this->profession->getSkills()->toArray(),
//        ];
//    }
}
