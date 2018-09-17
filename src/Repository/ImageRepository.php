<?php

namespace App\Repository;

use App\Entity\Image;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Image|null find($id, $lockMode = null, $lockVersion = null)
 * @method Image|null findOneBy(array $criteria, array $orderBy = null)
 * @method Image[]    findAll()
 * @method Image[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Image::class);
    }

//    /**
//     * @return Image[] Returns an array of Image objects
//     */
//    public function findAllByIds(array $ids)
//    {
//        if (empty($ids)) {
//            return;
//        }
//
//        dump(array_values($ids));
//
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.id IN (:ids)')
//            ->setParameter('ids', array_values($ids))
//            ->getQuery()
//            ->getArrayResult();
//    }
}
