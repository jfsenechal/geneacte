<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\Param;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Param|null find($id, $lockMode = null, $lockVersion = null)
 * @method Param|null findOneBy(array $criteria, array $orderBy = null)
 * @method Param[]    findAll()
 * @method Param[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Param::class);
    }

    /**
     * @return Param[]
     */
    public function findAllOrdered(array $except = ['Hidden', 'Deleted']): array
    {
        return $this->createQb()
            ->orderBy('parameter.ordre', 'ASC')
            ->andWhere('parameter.groupe NOT IN (:name)')
            ->setParameter('name', $except)
            ->getQuery()
            ->getResult();
    }

    public function findByName(string $name): ?Param
    {
        return $this->createQb()
            ->andWhere('parameter.param = :name')
            ->setParameter('name', $name)
            ->getQuery()->getOneOrNullResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('parameter');
    }

}
