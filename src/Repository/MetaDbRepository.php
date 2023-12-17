<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActMetaDb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
            ->orderBy('meta_db.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(ActMetaDb $meta_db): array
    {
        return $this->createQb()
            ->andWhere('meta_db.email = :shop')
            ->setParameter('shop', $meta_db)
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('meta_db')
            ->leftJoin('meta_db.country', 'country', 'WITH')
            ->addSelect('country');
    }

}
