<?php

namespace App\Entity;

use App\Repository\CharacterSkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterSkillRepository::class)]
class CharacterSkill //implements \JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer')]
    private ?int $value;

    #[ORM\ManyToOne(targetEntity: Skill::class)]
    #[ORM\JoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    private ?Skill $skill = null;
    
    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'skills', cascade: ['persist'])]
    #[ORM\JoinColumn(name: 'character_id', referencedColumnName: 'id')]
    private ?Character $character = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): self
    {
        $this->character = $character;
        return $this;
    }

    public function getSkill(): ?Skill
    {
        return $this->skill;
    }

    public function setSkill(?Skill $skill): self
    {
        $this->skill = $skill;
        return $this;
    }

//    public function jsonSerialize(): array
//    {
//        return [
//            'value' => $this->value,
//            'name' => $this->getSkill()->getName(),
//        ];
//
//    }

//    public function __serialize(): array
//    {
//        return $this->jsonSerialize();
//    }
}
