<?php

namespace App\Repository;

use App\Entity\StatistiquesConnexions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatistiquesConnexions|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatistiquesConnexions|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatistiquesConnexions[]    findAll()
 * @method StatistiquesConnexions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatistiquesConnexionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatistiquesConnexions::class);
    }

    // /**
    //  * @return StatistiquesConnexions[] Returns an array of StatistiquesConnexions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatistiquesConnexions
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
