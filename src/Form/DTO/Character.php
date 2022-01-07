<?php declare(strict_types=1);

namespace App\Form\DTO;

use App\CharacterGenerator\Enum\FemaleName;
use App\CharacterGenerator\Enum\MaleName;
use App\CharacterGenerator\Enum\Surname;
use App\Entity\Character as CharacterEntity;
use App\Form\Enum\Profession;
use App\Form\Enum\Sex;
use App\Form\Enum\Type;

class Character
{
    public FemaleName|MaleName|string|null $name = null;
    public Surname|string|null $surname = null;
    public ?Sex $sex = null;
    public ?Profession $profession = null;
    public ?Type $type = null;

    public function toEntity(): CharacterEntity
    {
        $character = new CharacterEntity();
        $character->setSex($this->sex ?? Sex::rand());

        $character->setName(
            $this->name ??
            match ($this->sex) {
                Sex::Female => FemaleName::rand(),
                Sex::Male => MaleName::rand(),
                default => null,
            }
        );

        $character->setSurname($this->surname ?? Surname::rand());

        $character->setProfession($this->profession ?? Profession::rand());

        return $character;
    }
}
