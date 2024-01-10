<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\MarriageCertificate;
use ExpoActe\Acte\Repository\Traits\CertificateCommonQueryTrait;

/**
 * @method MarriageCertificate|null find($id, $lockMode = null, $lockVersion = null)
 * @method MarriageCertificate|null findOneBy(array $criteria, array $orderBy = null)
 * @method MarriageCertificate[]    findAll()
 * @method MarriageCertificate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarriageRepository extends ServiceEntityRepository
{
    use OrmCrudTrait, CertificateCommonQueryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MarriageCertificate::class);
    }

    /**
     * @return MarriageCertificate[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('certificate.t1Nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array{commune:string, depart:string}
     */
    public function findMunicipalities(): array
    {
        return $this->createQb()
            ->select('certificate.commune', 'certificate.depart')
            ->distinct()
            ->orderBy('certificate.commune', 'ASC')
            ->getQuery()
            ->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('certificate');
    }
}
