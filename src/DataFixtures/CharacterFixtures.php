<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Character;
use App\Entity\Profession;
use App\Form\Enum\Sex;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CharacterFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $character = new Character();
        $character->setName('name');
        $character->setSurname('surname');
        $character->setAge(1);
        $character->setSex(Sex::Male);
        $character->setDescription('description');
        $character->setStrength(1);
        $character->setCharacterCondition(1);
        $character->setSize(1);
        $character->setDexterity(1);
        $character->setAppearance(1);
        $character->setIntelligence(1);
        $character->setEducation(1);
        $character->setSanity(1);
        $character->setPower(1);
        $character->setHitPoints(1);
        $character->setMagicPoint(1);
        $character->setUser($this->getReference('user'));
        $character->setProfession($this->getReference('Accountant'));

        $manager->persist($character);
        $this->addReference('character', $character);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SkillFixtures::class,
            ProfessionFixtures::class,
            UserFixture::class,
        ];
    }

}