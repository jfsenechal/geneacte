<?php

namespace App\Repository;

use App\Doctrine\OrmCrudTrait;
use App\Entity\ActNai3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActNai3|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActNai3|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActNai3[]    findAll()
 * @method ActNai3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BirthRepository extends ServiceEntityRepository
{
    use OrmCrudTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActNai3::class);
    }

    /**
     * @return ActNai3[]
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
