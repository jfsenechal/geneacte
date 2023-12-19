<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActMetalg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActMetalg|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActMetalg|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActMetalg[]    findAll()
 * @method ActMetalg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetaLgRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActMetalg::class);
    }

    /**
     * @return ActMetalg[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('meta_lg.etiq', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findOneByZid(int $zid): ?ActMetalg
    {
        return $this->createQb()
            ->andWhere('meta_lg.zid = :zid')
            ->setParameter('zid', $zid)
            ->getQuery()
            ->getOneOrNullResult();
    }


    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('meta_lg');
    }
}
