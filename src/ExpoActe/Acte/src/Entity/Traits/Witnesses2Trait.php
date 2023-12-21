<?php

namespace ExpoActe\Acte\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait Witnesses2Trait
{
    #[ORM\Column(name: 'T3_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t3Nom = null;

    #[ORM\Column(name: 'T3_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t3Pre = null;

    #[ORM\Column(name: 'T3_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t3Com = null;

    #[ORM\Column(name: 'T4_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t4Nom = null;

    #[ORM\Column(name: 'T4_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t4Pre = null;

    #[ORM\Column(name: 'T4_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t4Com = null;
}