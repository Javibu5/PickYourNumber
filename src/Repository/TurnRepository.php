<?php

/*
 * This file is part of the PickYourNumber package.
 *
 * (c) Javier Cañete Puentenueva
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Entity\Turn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Turn|null find($id, $lockMode = null, $lockVersion = null)
 * @method Turn|null findOneBy(array $criteria, array $orderBy = null)
 * @method Turn[]    findAll()
 * @method Turn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TurnRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Turn::class);
    }

    public function add(Turn $turn)
    {
        $this->_em->persist($turn);
        $this->_em->flush();
    }

    public function getLastTodayNumber(): int
    {
        $qb = $this->createQueryBuilder(t)
           ->select('MAX(t.Turn)')
            //select t.* from Turn
            ->andWhere('t.createdAt > :today')
            //where createdAt > today
            ->setParameter('today' , new \DateTime('today'))
            ->getQuery()
            ;

        $lastTurn = $qb->getSingleScalarResult();
        if($lastTurn == null){
            return 0;
        }
        return $lastTurn->getNumber();
    }



    // /**
    //  * @return Turn[] Returns an array of Turn objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Turn
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
