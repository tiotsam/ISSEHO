<?php

namespace App\Repository;

use App\Entity\Cours;
use App\Entity\Infos;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cours|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cours|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cours[]    findAll()
 * @method Cours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cours::class);
    }

    // /**
    //  * @return Cours[] Returns an array of Cours objects
    //  */
    public function findByProfId($authorId)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.Auteur = :authorId')
            ->setParameter('authorId', $authorId)
            ->orderBy('c.dateDebut', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Cours[] Returns an array of Cours objects
    //  */
    public function findByProfName($authorName)
    {
 
        return $this->createQueryBuilder('c')
            ->select('c')
            ->leftJoin(
                'App\Entity\Infos',
                'i',
                'WITH',
                'i.nom LIKE %:authorName% OR i.prenom LIKE %:authorName%'
            )
            ->andWhere('c.Auteur = :authorName')
            ->setParameter('authorName', $authorName)
            ->orderBy('c.dateDebut', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    public function countCours()
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c)')
            ->getQuery()
            ->getResult()
        ;
    }


    // /**
    //  * @return Cours[] Returns an array of Cours objects
    //  */
    public function findLastFour()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.dateDebut', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Cours[] Returns an array of Cours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cours
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
