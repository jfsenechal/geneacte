<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActPrenom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActPrenom|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActPrenom|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActPrenom[]    findAll()
 * @method ActPrenom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FirstNameRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActPrenom::class);
    }

    /**
     * @return ActPrenom[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('firstname.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(ActPrenom $firstname): array
    {
        return $this->createQb()
            ->andWhere('firstname.email = :shop')
            ->setParameter('shop', $firstname)
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('firstname')
            ->leftJoin('firstname.country', 'country', 'WITH')
            ->addSelect('country');
    }

}
