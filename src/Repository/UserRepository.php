<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class UserRepository extends ServiceEntityRepository
{
    private ObjectManager $em;

    public function __construct(ManagerRegistry $registry, ObjectManager $em)
    {
        parent::__construct($registry, User::class);
        $this->em = $em;
    }

    public function add(User $user): void
    {
        $this->em->persist($user);
        $this->em->flush();
    }
}