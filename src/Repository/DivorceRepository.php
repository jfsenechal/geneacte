<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActDiv3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActDiv3|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActDiv3|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActDiv3[]    findAll()
 * @method ActDiv3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DivorceRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActDiv3::class);
    }

    /**
     * @return ActDiv3[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('divorce.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(ActDiv3 $divorce): array
    {
        return $this->createQb()
            ->andWhere('divorce.email = :shop')
            ->setParameter('shop', $divorce)
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('divorce')
            ->leftJoin('divorce.country', 'country', 'WITH')
            ->addSelect('country');
    }

}
