<?php

namespace App\Repository;

use App\Entity\CharacterSkill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CharacterSkill|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterSkill|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterSkill[]    findAll()
 * @method CharacterSkill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterSkillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterSkill::class);
    }

    // /**
    //  * @return Abilities[] Returns an array of Abilities objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Abilities
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
