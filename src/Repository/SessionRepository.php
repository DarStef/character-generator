<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\Session;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class SessionRepository extends ServiceEntityRepository
{
    private ObjectManager $em;

    public function __construct(ManagerRegistry $registry, ObjectManager $em)
    {
        parent::__construct($registry, Session::class);
        $this->em = $em;
    }

    public function add(Session $session): void
    {
        $this->em->persist($session);
        $this->em->flush();
    }
}