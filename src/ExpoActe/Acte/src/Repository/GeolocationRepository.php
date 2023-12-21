<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\Geoloc;

/**
 * @method Geoloc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geoloc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geoloc[]    findAll()
 * @method Geoloc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeolocationRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Geoloc::class);
    }

    /**
     * @return Geoloc[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->getQuery()
            ->getResult();
    }

    public function alphabetMunicipalities(): array
    {
        $sql = "select alphabet.init  from ( select upper(left(commune,1)) as init,ascii(upper(left(commune,1)))  as oo from act_geoloc group by init,oo  order by init , oo asc) as alphabet group by init";
        $conn = $this->getEntityManager()->getConnection();
        $resultSet = $conn->executeQuery($sql);

        return $resultSet->fetchAllAssociative();
    }

    public function findMunicipalitiesByFirstLetter(string $letter): array
    {
        return $this->createQb()
            ->andWhere('geolocation.commune')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Geoloc[]
     */
    public function findAllMunicipalities(): array
    {
        return $this->createQb()
            ->getQuery()
            ->getResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('geolocation')
            ->orderBy('geolocation.nom', 'ASC');
    }

}
