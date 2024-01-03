<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\MarriageCertificate;
use ExpoActe\Acte\Repository\Traits\StatisticsTrait;

/**
 * @method MarriageCertificate|null find($id, $lockMode = null, $lockVersion = null)
 * @method MarriageCertificate|null findOneBy(array $criteria, array $orderBy = null)
 * @method MarriageCertificate[]    findAll()
 * @method MarriageCertificate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarriageRepository extends ServiceEntityRepository
{
    use OrmCrudTrait, StatisticsTrait;

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
            ->orderBy('marriage.t1Nom', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array{commune:string, depart:string}
     */
    public function findMunicipalities(): array
    {
        return $this->createQb()
            ->select('marriage.commune', 'marriage.depart')
            ->distinct()
            ->orderBy('marriage.commune', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function statt()
    {
        /**
         * select COMMUNE, DEPART, '' as LIBELLE, count(*) as ctot,  DEPOSANT, max(DTDEPOT) as ddepot,
         * min(if(year(LADATE)>0,year(LADATE), null)) as dmin,  max(year(LADATE)) as dmax,
         * sum(if(length(concat_ws('',P_PRE,M_NOM,M_PRE))>0,1,0)) as cfil,
         * sum(if(year(LADATE)>0,1,0)) as cnnul from act_nai3
         * where COMMUNE='Achêne' group by COMMUNE,DEPART,LIBELLE,DEPOSANT;
         */

    }

    public function ins()
    {
        /**
       * insert into act_sums (COMMUNE,DEPART,TYPACT,LIBELLE,DEPOSANT,DTDEPOT,AN_MIN,AN_MAX,NB_TOT,NB_N_NUL,NB_FIL,DER_MAJ)
         * values ('Abée', 'Liège', 'N', '', 78, '2022-05-14', 1901, 1920, 190, 190, 190, '2023-12-29 22:19:26');
*
         */

    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('marriage');
    }
}
