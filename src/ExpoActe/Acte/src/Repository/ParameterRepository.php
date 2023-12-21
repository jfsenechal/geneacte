<?php

namespace ExpoActe\Acte\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ExpoActe\Acte\Doctrine\OrmCrudTrait;
use ExpoActe\Acte\Entity\Parameter;

/**
 * @method Parameter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parameter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parameter[]    findAll()
 * @method Parameter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParameterRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parameter::class);
    }

    /**
     * @return Parameter[]
     */
    public function findAllOrdered(array $except = ['Hidden', 'Deleted']): array
    {
        return $this->createQb()
            ->orderBy('parameter.ordre', 'ASC')
            ->andWhere('parameter.groupe NOT IN (:name)')
            ->setParameter('name', $except)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Parameter[]
     */
    public function findAllGroup(): array
    {
        $groupedParameters = [];
        foreach ($this->findAllOrdered() as $parameter) {
            $groupedParameters[$parameter->groupe] = $parameter;
        }

        ksort($groupedParameters);

        return $groupedParameters;
    }

    /**
     * @return Parameter[]
     */
    public function findByGroup(string $name): array
    {
        return $this->createQb()
            ->andWhere('parameter.groupe = :name')
            ->setParameter('name', $name)
            ->getQuery()->getResult();
    }

    public function findOneByKey(string $name): ?Parameter
    {
        return $this->createQb()
            ->andWhere('parameter.param = :name')
            ->setParameter('name', $name)
            ->getQuery()->getOneOrNullResult();
    }

    private function createQb(): QueryBuilder
    {
        return $this->createQueryBuilder('parameter');
    }

}
