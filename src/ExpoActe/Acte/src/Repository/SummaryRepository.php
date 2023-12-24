<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\Summary;

/**
 * @method Summary|null find($id, $lockMode = null, $lockVersion = null)
 * @method Summary|null findOneBy(array $criteria, array $orderBy = null)
 * @method Summary[]    findAll()
 * @method Summary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SummaryRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Summary::class);
    }

    /**
     * @return Summary[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('act_sum.commune', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Summary[]
     */
    public function findMunicipalitiesByTable(string $certificateType): array
    {
        return $this->createQb()
            ->select('act_sum.commune', 'act_sum.depart')
            ->distinct()
            ->andWhere('act_sum.typact = :table')
            ->setParameter('table', $certificateType)
            ->addOrderBy('act_sum.commune')
            ->addOrderBy('act_sum.depart')
            ->getQuery()->getResult();
    }

    /**
     * @return Summary[]
     */
    public function findMunicipalitiesByTableAndName(string $certificateType, string $name): array
    {
        return $this->createQb()
            ->select('act_sum.commune', 'act_sum.depart')
            ->distinct()
            ->andWhere('act_sum.typact = :table')
            ->setParameter('table', $certificateType)
            ->andWhere('act_sum.commune LIKE :name OR act_sum.depart LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->addOrderBy('act_sum.commune')
            ->addOrderBy('act_sum.depart')
            ->getQuery()->getResult();
    }

    /**
     * @return Summary[]
     */
    public function findLabelsForOtherCertificates(): array
    {
        return $this->createQb()
            ->select('act_sum.libelle')
            ->distinct()
            ->andWhere('length(act_sum.libelle)>0')
            ->orderBy('act_sum.commune', 'DESC')
            ->getQuery()
            ->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('act_sum');
    }
}
