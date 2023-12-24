<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\MetaLabel;

/**
 * @method MetaLabel|null find($id, $lockMode = null, $lockVersion = null)
 * @method MetaLabel|null findOneBy(array $criteria, array $orderBy = null)
 * @method MetaLabel[]    findAll()
 * @method MetaLabel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetaLabelRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MetaLabel::class);
    }

    /**
     * @return MetaLabel[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('meta_lg.etiq', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findOneByZid(int $zid): ?MetaLabel
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
