<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\BirthCertificate;

/**
 * @method BirthCertificate|null find($id, $lockMode = null, $lockVersion = null)
 * @method BirthCertificate|null findOneBy(array $criteria, array $orderBy = null)
 * @method BirthCertificate[]    findAll()
 * @method BirthCertificate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BirthRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BirthCertificate::class);
    }

    /**
     * @return BirthCertificate[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('birth.t1Nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('birth');
    }
}
