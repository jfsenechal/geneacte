<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\MetaGroupLabel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MetaGroupLabel|null find($id, $lockMode = null, $lockVersion = null)
 * @method MetaGroupLabel|null findOneBy(array $criteria, array $orderBy = null)
 * @method MetaGroupLabel[]    findAll()
 * @method MetaGroupLabel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetaGroupLabelRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MetaGroupLabel::class);
    }

    /**
     * @return MetaGroupLabel[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('mgrplg.grp', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return MetaGroupLabel[]
     */
    public function findByTable(string $table): array
    {
        return $this->createQb()
            ->andWhere('mgrplg.dtable = :table')
            ->setParameter('table', $table)
            ->getQuery()->getResult();
    }

    /**
     * @return MetaGroupLabel[]
     */
    public function findByTableAndGrps(string $table, array $grps): array
    {
        return $this->createQb()
            ->andWhere('mgrplg.dtable = :table')
            ->setParameter('table', $table)
            ->andWhere('mgrplg.grp IN (:grps)')
            ->setParameter('grps', $grps)
            ->orderBy('mgrplg.grp')
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('mgrplg');
    }


}
