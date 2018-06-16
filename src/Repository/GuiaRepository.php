<?php

namespace App\Repository;

use App\Entity\Guia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Guia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guia[]    findAll()
 * @method Guia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuiaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Guia::class);
    }

//    /**
//     * @return Guia[] Returns an array of Guia objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Guia
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
