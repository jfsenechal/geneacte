<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\Log;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Log|null find($id, $lockMode = null, $lockVersion = null)
 * @method Log|null findOneBy(array $criteria, array $orderBy = null)
 * @method Log[]    findAll()
 * @method Log[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Log::class);
    }

    /**
     * @return Log[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('log.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(Log $log): array
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
