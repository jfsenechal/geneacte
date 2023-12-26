<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\User;
use ExpoActe\Acte\Security\RoleEnum;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @return User[]
     */
    public function findAllOrdered(int $max = 50): array
    {
        return $this->createQb()
            ->setMaxResults($max)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return User[]
     */
    public function findByName(string $name): array
    {
        return $this->createQb()
            ->andWhere(
                'user.email LIKE :name OR user.nom LIKE :name OR user.prenom LIKE :name OR user.login LIKE :name'
            )
            ->setParameter('name', '%' . $name . '%')
            ->getQuery()->getResult();
    }

    /**
     * @return User[]
     */
    public function search(?string $name, ?string $statut, ?RoleEnum $roleEnum, ?string $scoring): array
    {
        $qb = $this->createQb();
        if ($name) {
            $qb
                ->andWhere(
                    'user.email LIKE :name OR user.nom LIKE :name OR user.prenom LIKE :name OR user.login LIKE :name'
                )->setParameter('name', '%' . $name . '%');
        }
        if ($statut) {
            $qb->andWhere('user.statut = :statut')
                ->setParameter('statut', $statut);
        }
        if ($roleEnum) {
            $qb->andWhere('user.level = :role')
                ->setParameter('role', $roleEnum->value);
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
