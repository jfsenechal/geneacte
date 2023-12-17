<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActLog[]    findAll()
 * @method ActLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActLog::class);
    }

    /**
     * @return ActLog[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('log.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(ActLog $log): array
    {
        return $this->createQb()
            ->andWhere('log.email = :shop')
            ->setParameter('shop', $log)
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('log')
            ->leftJoin('log.country', 'country', 'WITH')
            ->addSelect('country');
    }

}
