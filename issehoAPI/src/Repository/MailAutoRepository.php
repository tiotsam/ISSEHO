<?php

namespace App\Repository;

use App\Entity\MailAuto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MailAuto|null find($id, $lockMode = null, $lockVersion = null)
 * @method MailAuto|null findOneBy(array $criteria, array $orderBy = null)
 * @method MailAuto[]    findAll()
 * @method MailAuto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MailAutoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MailAuto::class);
    }

    // /**
    //  * @return MailAuto[] Returns an array of MailAuto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MailAuto
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
