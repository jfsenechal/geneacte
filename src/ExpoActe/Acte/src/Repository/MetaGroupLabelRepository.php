<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\MetaGroupLabel;

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
    public function findByCertificateType(string $certificateType): array
    {
        return $this->createQb()
            ->andWhere('mgrplg.dtable = :table')
            ->setParameter('table', $certificateType)
            ->getQuery()->getResult();
    }

    /**
     * @return MetaGroupLabel|null
     * @throws NonUniqueResultException
     */
    public function findByCertificateTypeAndGrp(string $certificateType, string $grp): ?MetaGroupLabel
    {
        return $this->createQb()
            ->andWhere('mgrplg.dtable = :table')
            ->setParameter('table', $certificateType)
            ->andWhere('mgrplg.grp = :code')
            ->setParameter('code', $grp)
            ->getQuery()->getOneOrNullResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('mgrplg');
    }


}
