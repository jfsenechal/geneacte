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
    public function findAllOrdered(int $max = 50): array
    {
        return $this->createQb()
            ->setMaxResults($max)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return ActUser3[]
     */
    public function findByName(string $name): array
    {
        return $this->createQb()
            ->andWhere(
                'user.email LIKE :name OR user.nom LIKE :name OR user.prenom LIKE :name OR user.login LIKE :name'
            )
            ->setParameter('name', '%'.$name.'%')
            ->getQuery()->getResult();
    }

    /**
     * @return ActUser3[]
     */
    public function search(?string $name, ?string $statut, ?int $role, ?string $scoring): array
    {
        $qb = $this->createQb();
        if ($name) {
            $qb
                ->andWhere(
                    'user.email LIKE :name OR user.nom LIKE :name OR user.prenom LIKE :name OR user.login LIKE :name'
                )->setParameter('name', '%'.$name.'%');
        }
        if ($statut) {
            $qb->andWhere('user.statut = :statut')
                ->setParameter('statut', $statut);
        }
        if ($role) {
            $qb->andWhere('user.level = :role')
                ->setParameter('role', $role);
        }
        if ($scoring) {
            $qb->andWhere('user.regime = :scoring')
                ->setParameter('scoring', $scoring);
        }

        return $qb->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('user')
            ->addOrderBy('user.nom');
    }

}
