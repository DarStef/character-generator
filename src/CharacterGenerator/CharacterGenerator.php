<?php declare(strict_types=1);

namespace App\CharacterGenerator;


use App\CharacterGenerator\Enum\FemaleName;
use App\CharacterGenerator\Enum\MaleName;
use App\CharacterGenerator\Enum\Surname;
use App\Entity\Character;
use App\Form\DTO\Character as CharacterDTO;
use App\Form\Enum\Profession;
use App\Form\Enum\Sex;

class CharacterGenerator
{
    private const MULTIPLIER = 5;
    private ?Character $character = null;

    public function generate(CharacterDTO $characterDTO): Character
    {
        $this->character = $characterDTO->toEntity();

        $this->setCharacteristics();

        $this->ageFactor();

        $this->setHitPoints();

        return $this->character;
    }

    private function setCharacteristics(): void
    {
        $this->character->setAge(random_int(20, 59))
            ->setStrength(Dice::d6(3) * self::MULTIPLIER)
            ->setCondition(Dice::d6(3) * self::MULTIPLIER)
            ->setSize((Dice::d6(2) + 6) * self::MULTIPLIER)
            ->setDexterity(Dice::d6(3) * self::MULTIPLIER)
            ->setAppearance(Dice::d6(3) * self::MULTIPLIER)
            ->setIntelligence((Dice::d6(2) + 6) * self::MULTIPLIER)
            ->setPower(Dice::d6(3) * self::MULTIPLIER)
            ->setEducation((Dice::d6(2) + 6) * self::MULTIPLIER);
    }

    private function ageFactor(): void
    {
        $age = $this->character->getAge();
        if ($age < 39) {
            $this->developmentEducationTest(1);
        } elseif ($age < 49) {
            $this->developmentEducationTest(2);
            $this->ageDebuff(5);
        } else {
            $this->developmentEducationTest(3);
            $this->ageDebuff(10);
        }
    }

    private function developmentEducationTest(int $times): void
    {
        for ($i = 0; $i < $times; $i++) {
            if (Dice::d100(1) > $this->character->getEducation()) {
                $this->character->addEducation(Dice::d10(1));
            }
        }
    }

    private function ageDebuff(int $value): void
    {
        switch (Dice::d3(1)) {
            case 1:
                $this->character->addStrength(-$value);
                break;
            case 2:
                $this->character->addCondition(-$value);
                break;
            case 3:
                $this->character->addDexterity(-$value);
        }
        $this->character->addAppearance(-$value);
    }

    private function setHitPoints(): void
    {
        $this->character->setHitPoints((int)floor(($this->character->getCondition() + $this->character->getSize()) / 10));
    }


}