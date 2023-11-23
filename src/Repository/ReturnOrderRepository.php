<?php

namespace App\Repository;

use App\Entity\ReturnOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReturnOrder>
 *
 * @method ReturnOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReturnOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReturnOrder[]    findAll()
 * @method ReturnOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReturnOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReturnOrder::class);
    }

//    /**
//     * @return ReturnOrder[] Returns an array of ReturnOrder objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReturnOrder
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
