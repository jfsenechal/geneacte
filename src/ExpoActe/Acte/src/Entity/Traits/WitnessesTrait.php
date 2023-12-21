<?php

namespace ExpoActe\Acte\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait WitnessesTrait
{
    #[ORM\Column(name: 'T1_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t1Nom = null;

    #[ORM\Column(name: 'T1_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t1Pre = null;

    #[ORM\Column(name: 'T1_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t1Com = null;

    #[ORM\Column(name: 'T2_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t2Nom = null;

    #[ORM\Column(name: 'T2_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t2Pre = null;

    #[ORM\Column(name: 'T2_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t2Com = null;
}