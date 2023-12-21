<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\Firstname;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Firstname|null find($id, $lockMode = null, $lockVersion = null)
 * @method Firstname|null findOneBy(array $criteria, array $orderBy = null)
 * @method Firstname[]    findAll()
 * @method Firstname[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FirstNameRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Firstname::class);
    }

    /**
     * @return Firstname[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('firstname.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(Firstname $firstname): array
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
