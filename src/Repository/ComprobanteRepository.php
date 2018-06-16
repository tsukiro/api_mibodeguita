<?php

namespace App\Repository;

use App\Entity\Comprobante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Comprobante|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comprobante|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comprobante[]    findAll()
 * @method Comprobante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComprobanteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comprobante::class);
    }

//    /**
//     * @return Comprobante[] Returns an array of Comprobante objects
//     */
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
    public function findOneBySomeField($value): ?Comprobante
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
