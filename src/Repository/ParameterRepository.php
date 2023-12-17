<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActParams;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActParams|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActParams|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActParams[]    findAll()
 * @method ActParams[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActParams::class);
    }

    /**
     * @return ActParams[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('parameter.ordre', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByName(string $name): ?ActParams
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
