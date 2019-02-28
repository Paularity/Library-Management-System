<?php

namespace App\Repository;

use App\Entity\DateUpdated;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DateUpdated|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateUpdated|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateUpdated[]    findAll()
 * @method DateUpdated[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateUpdatedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DateUpdated::class);
    }

    // /**
    //  * @return DateUpdated[] Returns an array of DateUpdated objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DateUpdated
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
