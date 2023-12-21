<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\OtherCertificate;

/**
 * @method OtherCertificate|null find($id, $lockMode = null, $lockVersion = null)
 * @method OtherCertificate|null findOneBy(array $criteria, array $orderBy = null)
 * @method OtherCertificate[]    findAll()
 * @method OtherCertificate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DivorceRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OtherCertificate::class);
    }

    /**
     * @return OtherCertificate[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('divorce.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCommercant(OtherCertificate $divorce): array
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
