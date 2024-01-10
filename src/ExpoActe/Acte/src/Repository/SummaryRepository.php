<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\Summary;

/**
 * @method Summary|null find($id, $lockMode = null, $lockVersion = null)
 * @method Summary|null findOneBy(array $criteria, array $orderBy = null)
 * @method Summary[]    findAll()
 * @method Summary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SummaryRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Summary::class);
    }

    /**
     * @return Summary[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->orderBy('summary.commune', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array{commune:string, depart:string,id: int}
     */
    public function findMunicipalitiesByCertificateType(string $certificateType): array
    {
        return $this->createQb()
            ->select('summary.commune', 'summary.depart', 'summary.id')
            ->addGroupBy('summary.commune')
            ->addGroupBy('summary.depart')
            ->andWhere('summary.typact = :table')
            ->setParameter('table', $certificateType)
            ->addOrderBy('summary.commune')
            ->addOrderBy('summary.depart')
            ->getQuery()->getResult();
    }

    /**
     * @return Summary[]
     */
    public function findMunicipalityAndCertificateType(string $municipality, string $certificateType): array
    {
        return $this->createQb()
            ->andWhere('summary.commune = :commune')
            ->setParameter('commune', $municipality)
            ->andWhere('summary.typact = :table')
            ->setParameter('table', $certificateType)
            ->addOrderBy('summary.depart')
            ->getQuery()->getResult();
    }

    /**
     * @return array{commune:string, depart:string,id: int}
     */
    public function findMunicipalitiesByCertificateTypeAndName(string $certificateType, string $name): array
    {
        return $this->createQb()
            ->select('summary.commune', 'summary.depart', 'summary.id')
            ->addGroupBy('summary.commune')
            ->addGroupBy('summary.depart')
            ->andWhere('summary.typact = :table')
            ->setParameter('table', $certificateType)
            ->andWhere('summary.commune LIKE :name OR act_sum.depart LIKE :name')
            ->setParameter('name', '%'.$name.'%')
            ->addOrderBy('summary.commune')
            ->addOrderBy('summary.depart')
            ->getQuery()->getResult();
    }

    /**
     * @return Summary[]
     */
    public function findLabelsForOtherCertificates(): array
    {
        return $this->createQb()
            ->select('summary.libelle')
            ->distinct()
            ->andWhere('length(act_sum.libelle)>0')
            ->orderBy('summary.commune', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function certificateMenu(): array
    {
        return $this->createQb()
            ->select('summary.typact, SUM(summary.nb_tot) as total')
            ->groupBy('summary.typact')
            ->addOrderBy("INSTR('NMDV',summary.typact)")
            ->getQuery()->getResult();
    }

    public function alphabetCertificateType(): array
    {
        $tableName = $this->getClassMetadata()->table['name'];
        $sql = "select alphabet.init  from ( select upper(left(commune,1)) as init,ascii(upper(left(commune,1)))  as oo from $tableName group by init,oo  order by init , oo asc) as alphabet group by init";
        $conn = $this->getEntityManager()->getConnection();
        $resultSet = $conn->executeQuery($sql);

        return $resultSet->fetchAllAssociative();

    }

    public function findCertificatesByType(string $type): array
    {
        /**
         * select typact, libelle,commune,depart, min(AN_MIN) R_AN_MIN, max(AN_MAX) R_AN_MAX, sum(NB_FIL) S_NB_FIL, sum(NB_TOT) S_NB_TOT, sum(NB_N_NUL) S_NB_N_NUL
         * from act_sums where typact = 'M' group by typact,libelle,commune,depart order by libelle,commune,depart;
         */
        $tableName = $this->getClassMetadata()->table['name'];
        $sql = "select typact, libelle,commune,depart, min(an_min) r_an_min, max(an_max) r_an_max, sum(nb_fil) s_nb_fil, sum(nb_tot) s_nb_tot, sum(nb_n_nul) s_nb_nul from $tableName where typact = '$type' group by typact,libelle,commune,depart order by libelle,commune,depart;";
        $conn = $this->getEntityManager()->getConnection();
        $resultSet = $conn->executeQuery($sql);

        return $resultSet->fetchAllAssociative();

    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('summary');
    }
}
