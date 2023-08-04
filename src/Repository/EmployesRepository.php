<?php

namespace App\Repository;

use App\Entity\Lenomdelatable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lenomdelatable>
 *
 * @method Lenomdelatable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lenomdelatable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lenomdelatable[]    findAll()
 * @method Lenomdelatable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LenomdelatableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lenomdelatable::class);
    }

//    /**
//     * @return Lenomdelatable[] Returns an array of Lenomdelatable objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Lenomdelatable
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
