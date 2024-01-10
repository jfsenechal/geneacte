<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\OtherCertificate;
use ExpoActe\Acte\Repository\Traits\CertificateCommonQueryTrait;

/**
 * @method OtherCertificate|null find($id, $lockMode = null, $lockVersion = null)
 * @method OtherCertificate|null findOneBy(array $criteria, array $orderBy = null)
 * @method OtherCertificate[]    findAll()
 * @method OtherCertificate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OtherCertificateRepository extends ServiceEntityRepository
{
    use OrmCrudTrait, CertificateCommonQueryTrait;

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
            ->orderBy('other_certificate.nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('other_certificate');
    }
}
