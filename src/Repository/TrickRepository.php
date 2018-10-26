<?php

namespace App\Repository;

use App\Entity\Trick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * @method Trick|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trick|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trick[]    findAll()
 * @method Trick[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrickRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Trick::class);
    }

    public function findById(int $trickId)
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.videos', 'v')
            ->addSelect('v')
            ->leftJoin('t.images', 'i')
            ->addSelect('i')
            ->leftJoin('t.category', 'c')
            ->addSelect('c')
            ->andWhere('t.id = :id')
            ->setParameter('id', $trickId)
            ->getQuery()
            ->getSingleResult();
    }
}
