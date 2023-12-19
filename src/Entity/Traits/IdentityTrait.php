<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait IdentityTrait
{
    #[ORM\Column(name: 'BIDON', type: Types::STRING, length: 10, nullable: true)]
    public ?string $bidon = null;

    #[ORM\Column(name: 'CODCOM', type: Types::STRING, length: 12, nullable: true)]
    public ?string $codcom = null;

    #[ORM\Column(name: 'COMMUNE', type: Types::STRING, length: 40, nullable: true)]
    public ?string $commune = null;

    #[ORM\Column(name: 'CODDEP', type: Types::STRING, length: 10, nullable: true)]
    public ?string $coddep = null;

    #[ORM\Column(name: 'DEPART', type: Types::STRING, length: 40, nullable: true)]
    public ?string $depart = null;

    #[ORM\Column(name: 'DATETXT', type: Types::STRING, length: 10, nullable: true)]
    public ?string $datetxt = null;

    #[ORM\Column(name: 'DREPUB', type: Types::STRING, length: 25, nullable: true)]
    public ?string $drepub = null;

    #[ORM\Column(name: 'COTE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cote = null;

    #[ORM\Column(name: 'LIBRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $libre = null;

    #[ORM\Column(name: 'NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $nom = null;

    #[ORM\Column(name: 'PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pre = null;

}