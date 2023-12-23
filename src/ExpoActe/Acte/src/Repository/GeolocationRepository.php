<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\Geolocation;

/**
 * @method Geolocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geolocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geolocation[]    findAll()
 * @method Geolocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeolocationRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Geolocation::class);
    }

    /**
     * @return Geolocation[]
     */
    public function findAllOrdered(): array
    {
        return $this->createQb()
            ->getQuery()
            ->getResult();
    }

    /**
     * @throws Exception
     */
    public function alphabetMunicipalities(): array
    {
        $certificateType = $this->getClassMetadata()->table['name'];
        $sql = "select alphabet.init  from ( select upper(left(commune,1)) as init,ascii(upper(left(commune,1)))  as oo from $certificateType group by init,oo  order by init , oo asc) as alphabet group by init";
        $conn = $this->getEntityManager()->getConnection();
        $resultSet = $conn->executeQuery($sql);

        return $resultSet->fetchAllAssociative();
    }

    /**
     * @return Geolocation[]
     */
    public function findMunicipalitiesByFirstLetter(string $letter): array
    {
        return $this->createQb()
            ->andWhere('geolocation.commune LIKE :letter')
            ->setParameter('letter', $letter.'%')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Geolocation[]
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
            ->orderBy('geolocation.commune', 'ASC');
    }

}
