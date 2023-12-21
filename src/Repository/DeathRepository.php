<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\DeathCertificate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeathCertificate|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeathCertificate|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeathCertificate[]    findAll()
 * @method DeathCertificate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeathRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeathCertificate::class);
    }

    /**
     * @return DeathCertificate[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('death.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(DeathCertificate $death): array
    {
        return $this->createQb()
            ->andWhere('death.email = :shop')
            ->setParameter('shop', $death)
            ->getQuery()->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('death')
            ->leftJoin('death.country', 'country', 'WITH')
            ->addSelect('country');
    }

}
