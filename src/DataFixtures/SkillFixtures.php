<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    private const SKILLS = [
        'CthulhuMythos' => 00,
        'CreditRating' => 00,
        'Accounting' => 05,
        'Acting' => 05,
        'Anthropology' => 01,
        'Appraise' => 05,
        'Archaeology' => 01,
        'ArtAndCraft' => 05,
        'Astronomy' => 01,
        'Axe' => 15,
        'Biology' => 01,
        'Botany' => 01,
        'Bow' => 15,
        'Brawl' => 25,
        'Chainsaw' => 10,
        'Charm' => 15,
        'Chemistry' => 01,
        'Climb' => 20,
        'Cryptography' => 01,
        'Disguise' => 05,
        'Diving' => 01,
        'DriveAuto' => 20,
        'ElectricalRepair' => 10,
        'FastTalk' => 05,
        'Fighting' => 25,
        'FineArt' => 05,
        'Firearms' => 20,
        'FirstAid' => 30,
        'Flail' => 10,
        'Flamethrower' => 10,
        'Forensics' => 05,
        'Forgery' => 01,
        'Garrote' => 15,
        'Geology' => 01,
        'Handgun' => 20,
        'HeavyWeapons' => 10,
        'History' => 05,
        'Intimidate' => 15,
        'Jump' => 20,
        'OtherLanguage' => 01,
        'Law' => 05,
        'LibraryUse' => 20,
        'Listen' => 20,
        'Locksmith' => 01,
        'MachineGun' => 10,
        'Mathematics' => 01,
        'MechanicalRepair' => 10,
        'Medicine' => 01,
        'Meteorology' => 01,
        'NaturalWorld' => 10,
        'Navigate' => 10,
        'Occult' => 05,
        'OperateHeavyMachinery' => 01,
        'Persuade' => 10,
        'Pharmacy' => 01,
        'Photography' => 05,
        'Physics' => 01,
        'Pilot' => 01,
        'Psychoanalysis' => 01,
        'Psychology' => 10,
        'Ride' => 05,
        'Rifle' => 25,
        'Science' => 01,
        'Shotgun' => 25,
        'SleightOfHand' => 10,
        'Spear' => 20,
        'SpotHidden' => 25,
        'Stealth' => 20,
        'SubMachineGun' => 15,
        'Survival' => 10,
        'Sword' => 20,
        'Swim' => 20,
        'Throw' => 20,
        'Track' => 10,
        'Whip' => 05,
        'Zoology' => 01,
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $name => $value){
            $skill = new Skill();
            $skill->setName($name)
                ->setValue($value);
            $manager->persist($skill);

            $this->addReference($name, $skill);
        }

        $manager->flush();
    }

}
