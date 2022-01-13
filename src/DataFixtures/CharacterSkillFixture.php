<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Character;
use App\Entity\CharacterSkill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CharacterSkillFixture extends Fixture implements DependentFixtureInterface
{
    private const SKILLS = [
        'Accounting', 'Acting', 'Anthropology'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $skill){
            $characterSkill = new CharacterSkill();
            $characterSkill->setValue(1);
            $characterSkill->setSkill($this->getReference($skill));
            $characterSkill->setCharacter($this->getReference('character'));
            $manager->persist($characterSkill);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SkillFixtures::class,
            ProfessionFixtures::class,
            UserFixture::class,
            CharacterFixtures::class,
        ];
    }

}