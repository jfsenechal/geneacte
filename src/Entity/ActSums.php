<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActSums
 */
#[ORM\Table(name: 'act_sums')]
#[ORM\Index(name: 'typ_lib_com_dep', columns: ['TYPACT', 'LIBELLE', 'COMMUNE', 'DEPART'])]
#[ORM\Entity]
class ActSums
{
    #[ORM\Column(name: 'id', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;

    #[ORM\Column(name: 'COMMUNE', type: Types::STRING, length: 40, nullable: false)]
    public string $commune = '';

    #[ORM\Column(name: 'DEPART', type: Types::STRING, length: 40, nullable: true)]
    public ?string $depart = null;

    #[ORM\Column(name: 'TYPACT', type: Types::STRING, length: 1, nullable: false, options: ['fixed' => true])]
    public string $typact = '';

    #[ORM\Column(name: 'LIBELLE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $libelle = null;

    #[ORM\Column(name: 'DEPOSANT', type: Types::INTEGER, nullable: true)]
    public ?int $deposant = null;

    #[ORM\Column(name: 'DTDEPOT', type: Types::DATE_MUTABLE, nullable: true)]
    public ?DateTimeInterface $dtdepot = null;

    #[ORM\Column(name: 'AN_MIN', type: Types::INTEGER, nullable: true)]
    public ?int $anMin = null;

    #[ORM\Column(name: 'AN_MAX', type: Types::INTEGER, nullable: true)]
    public ?int $anMax = null;

    #[ORM\Column(name: 'NB_TOT', type: Types::INTEGER, nullable: true)]
    public ?int $nbTot = null;

    #[ORM\Column(name: 'NB_N_NUL', type: Types::INTEGER, nullable: true)]
    public ?int $nbNNul = null;

    #[ORM\Column(name: 'NB_FIL', type: Types::INTEGER, nullable: true)]
    public ?int $nbFil = null;

    #[ORM\Column(name: 'DER_MAJ', type: Types::DATETIME_MUTABLE, nullable: true)]
    public ?DateTimeInterface $derMaj = null;


}
