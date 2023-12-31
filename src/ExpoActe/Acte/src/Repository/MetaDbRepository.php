<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\Metadb;
use ExpoActe\Acte\Entity\MetaLabel;

/**
 * @method Metadb|null find($id, $lockMode = null, $lockVersion = null)
 * @method Metadb|null findOneBy(array $criteria, array $orderBy = null)
 * @method Metadb[]    findAll()
 * @method Metadb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetaDbRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Metadb::class);
    }

    /**
     * @return Metadb[]
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
    public function findOneByZid(int $zid): ?Metadb
    {
        return $this->createQb()
            ->andWhere('metaDb.zid = :zid')
            ->setParameter('zid', $zid)
            ->getQuery()->getOneOrNullResult();
    }

    /**
     * @return Metadb[]
     */
    public function findByCertificateTypeAndGroup(string $certificateType, string $groupe, array $except = ['T']): array
    {
        return $this->createQb()
            ->andWhere('metaDb.dtable = :table')
            ->setParameter('table', $certificateType)
            ->andWhere('metaDb.groupe = :groupe')
            ->setParameter('groupe', $groupe)
            ->addOrderBy('metaDb.zone')
            ->andWhere('metaDb.affich NOT IN (:affich)')
            ->setParameter('affich', $except)
            ->getQuery()->getResult();
    }

    /**
     * @return Metadb[]
     */
    public function findByCertificateType(string $certificateType, array $except = ['T']): array
    {
        $metas = $this->createQb()
            ->andWhere('metaDb.dtable = :table')
            ->setParameter('table', $certificateType)
            ->andWhere('metaDb.affich NOT IN (:affich)')
            ->setParameter('affich', $except)
            ->addOrderBy('metaDb.groupe')
            ->addOrderBy('metaDb.ov3')
            ->getQuery()->getResult();

        $metaLabelRepository = $this->getEntityManager()->getRepository(MetaLabel::class);
        foreach ($metas as $meta) {
            $meta->metaLabel = $metaLabelRepository->findOneByZid($meta->zid);
        }

        return $metas;
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('metaDb');
    }
}
