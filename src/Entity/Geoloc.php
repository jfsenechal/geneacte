<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActGeoloc
 */
#[ORM\Table(name: 'act_geoloc')]
//#[ORM\UniqueConstraint(name: 'COMMUNE', columns: ['COMMUNE', 'DEPART'])]
#[ORM\Entity]
class Geoloc
{
    #[ORM\Column(name: 'ID', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;

    #[ORM\Column(name: 'COMMUNE', type: Types::STRING, length: 40, nullable: false)]
    public string $commune = '';

    #[ORM\Column(name: 'DEPART', type: Types::STRING, length: 40, nullable: false)]
    public string $depart = '';

    #[ORM\Column(name: 'LON', type: Types::FLOAT, precision: 10, scale: 0, nullable: true)]
    public ?float $lon = null;

    #[ORM\Column(name: 'LAT', type: Types::FLOAT, precision: 10, scale: 0, nullable: true)]
    public ?float $lat = null;

    #[ORM\Column(name: 'STATUT', type: Types::STRING, length: 1, nullable: false, options: ['default' => 'N'])]
    public string $statut = 'N';

    #[ORM\Column(name: 'NOTE_N', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $noteN = null;

    #[ORM\Column(name: 'NOTE_M', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $noteM = null;

    #[ORM\Column(name: 'NOTE_D', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $noteD = null;

    #[ORM\Column(name: 'NOTE_V', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $noteV = null;


}
