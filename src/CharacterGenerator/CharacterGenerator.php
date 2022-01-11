<?php declare(strict_types=1);

namespace App\CharacterGenerator;


use App\CharacterGenerator\Enum\FemaleName;
use App\CharacterGenerator\Enum\MaleName;
use App\CharacterGenerator\Enum\Surname;
use App\Entity\Character;
use App\Entity\CharacterSkill;
use App\Entity\Skill;
use App\Entity\User;
use App\Form\DTO\Character as CharacterDTO;
use App\Form\Enum\Sex;
use App\Repository\CharacterRepository;
use App\Repository\ProfessionRepository;

class CharacterGenerator
{
    private const MULTIPLIER = 5;
    private ?Character $character = null;
    private ProfessionRepository $professionRepository;
    private CharacterRepository $characterRepository;

    public function __construct(ProfessionRepository $professionRepository, CharacterRepository $characterRepository)
    {
        $this->professionRepository = $professionRepository;
        $this->characterRepository = $characterRepository;
    }

    public function generate(CharacterDTO $characterDTO, User $user): Character
    {
        $this->character = $characterDTO->toEntity();

        $this->setCharacteristics();

        $this->ageFactor();

        $this->setDependentAtributes();

        $this->setCharacterSkills();

        $this->character->setUser($user);
        $this->characterRepository->add($this->character);

        return $this->character;
    }

    private function setCharacteristics(): void
    {
        $this->character->setAge(random_int(20, 59))
            ->setStrength(Dice::d6(3) * self::MULTIPLIER)
            ->setCharacterCondition(Dice::d6(3) * self::MULTIPLIER)
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

    private function setDependentAtributes(): void
    {
        $this->character->setHitPoints((int)floor(($this->character->getCharacterCondition() + $this->character->getSize()) / 10));
        $this->character->setSanity($this->character->getPower());
        $this->character->setMagicPoint((int)floor($this->character->getPower()/5));
    }

    private function setCharacterSkills(): void
    {
        if($this->character->getProfession() === null) {
            $professions = $this->professionRepository->findAll();
            $profession = $professions[random_int(0, count($professions) - 1)];
            $this->character->setProfession($profession);
        }
        $points = $this->character->getEducation() * 4;
        /** @var Skill $skill */
        foreach ($profession->getSkills() as $skill){
            $characterSkill = new CharacterSkill();
            $characterSkill->setSkill($skill);
            $value = random_int(0,$points);
            $points-=$value;
            $value += $skill->getValue();
            if($value>=100){
                $points += abs(100 - $value);
                $value = 100;
            }
            $characterSkill->setValue($value);
            $this->character->addSkill($characterSkill);
        }
    }


}