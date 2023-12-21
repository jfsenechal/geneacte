<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\Geoloc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Geoloc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geoloc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geoloc[]    findAll()
 * @method Geoloc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeolocationRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Geoloc::class);
    }

    /**
     * @return Geoloc[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('geolocation.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(Geoloc $geolocation): array
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
