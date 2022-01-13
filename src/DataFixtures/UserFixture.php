<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {

    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('username');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
        $user->setRoles([]);
        $manager->persist($user);
        $manager->flush();

        $this->addReference('user', $user);
    }
}