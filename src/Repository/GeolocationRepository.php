<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActGeoloc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActGeoloc|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActGeoloc|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActGeoloc[]    findAll()
 * @method ActGeoloc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeolocationRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActGeoloc::class);
    }

    /**
     * @return ActGeoloc[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('geolocation.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(ActGeoloc $geolocation): array
    {
        return $this->createQb()
            ->andWhere('geolocation.email = :shop')
            ->setParameter('shop', $geolocation)
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('geolocation')
            ->leftJoin('geolocation.country', 'country', 'WITH')
            ->addSelect('country');
    }

}
