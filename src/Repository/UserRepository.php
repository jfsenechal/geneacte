<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActUser3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActUser3|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActUser3|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActUser3[]    findAll()
 * @method ActUser3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActUser3::class);
    }

    /**
     * @return ActUser3[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('user.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(ActUser3 $user): array
    {
        return $this->createQb()
            ->andWhere('user.email = :shop')
            ->setParameter('shop', $user)
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('user');
    }

}
