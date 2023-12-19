<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActMetadb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActMetaDb|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActMetaDb|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActMetaDb[]    findAll()
 * @method ActMetaDb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetaDbRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActMetaDb::class);
    }

    /**
     * @return ActMetaDb[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('metaDb.groupe', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findOneByZid(int $zid): ?ActMetadb
    {
        return $this->createQb()
            ->andWhere('metaDb.zid = :zid')
            ->setParameter('zid', $zid)
            ->getQuery()->getOneOrNullResult();
    }

    /**
     * @return ActMetaDb[]
     */
    public function findByTableAndGroup(string $table, string $groupe, array $except = ['T']): array
    {
        return $this->createQb()
            ->andWhere('metaDb.dtable = :table')
            ->setParameter('table', $table)
            ->andWhere('metaDb.groupe = :groupe')
            ->setParameter('groupe', $groupe)
            ->addOrderBy('metaDb.zone')
            ->andWhere('metaDb.affich NOT IN (:affich)')
            ->setParameter('affich', $except)
            ->getQuery()->getResult();
    }

    /**
     * @return ActMetaDb[]
     */
    public function findByTable(string $table, array $except = ['T']): array
    {
        return $this->createQb()
            ->andWhere('metaDb.dtable = :table')
            ->setParameter('table', $table)
            ->andWhere('metaDb.affich NOT IN (:affich)')
            ->setParameter('affich', $except)
            ->addOrderBy('metaDb.groupe')
            ->addOrderBy('metaDb.ov3')
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('metaDb');
    }
}
