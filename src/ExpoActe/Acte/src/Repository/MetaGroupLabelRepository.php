<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\MetaGroupLabel;
use ExpoActe\Acte\Label\LabelGroupEnum;

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
            ->orderBy('meta_group_label.grp', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return MetaGroupLabel[]
     */
    public function findByCertificateType(string $certificateType): array
    {
        $labelGroups = $this->createQb()
            ->andWhere('meta_group_label.dtable = :table')
            ->setParameter('table', $certificateType)
            ->getQuery()->getResult();

        foreach ($labelGroups as $labelGroup) {
            $labelGroup->labelGroupEnum = LabelGroupEnum::from($labelGroup->grp);
        }

        return $labelGroups;
    }

    /**
     * @return MetaGroupLabel|null
     * @throws NonUniqueResultException
     */
    public function findByCertificateTypeAndGrp(string $certificateType, string $grp): ?MetaGroupLabel
    {
        return $this->createQb()
            ->andWhere('meta_group_label.dtable = :table')
            ->setParameter('table', $certificateType)
            ->andWhere('meta_group_label.grp = :code')
            ->setParameter('code', $grp)
            ->getQuery()->getOneOrNullResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('meta_group_label');
    }


}
