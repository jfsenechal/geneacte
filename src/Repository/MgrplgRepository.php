<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActMgrplg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActMgrplg|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActMgrplg|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActMgrplg[]    findAll()
 * @method ActMgrplg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MgrplgRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActMgrplg::class);
    }

    /**
     * @return ActMgrplg[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('mgrplg.grp', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return ActMgrplg[]
     */
    public function findByTable(string $table): array
    {
        return $this->createQb()
            ->andWhere('mgrplg.dtable = :table')
            ->setParameter('table', $table)
            ->getQuery()->getResult();
    }

    /**
     * @return ActMgrplg[]
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
