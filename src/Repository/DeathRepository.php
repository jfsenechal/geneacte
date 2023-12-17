<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActDec3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActDec3|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActDec3|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActDec3[]    findAll()
 * @method ActDec3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeathRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActDec3::class);
    }

    /**
     * @return ActDec3[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('death.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(ActDec3 $death): array
    {
        return $this->createQb()
            ->andWhere('death.email = :shop')
            ->setParameter('shop', $death)
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('death')
            ->leftJoin('death.country', 'country', 'WITH')
            ->addSelect('country');
    }

}
