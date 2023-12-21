<?php

namespace ExpoActe\Acte\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait WitnessesTrait
{
    #[ORM\Column(name: 'T1_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t1_nom = null;

    #[ORM\Column(name: 'T1_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t1_pre = null;

    #[ORM\Column(name: 'T1_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t1_com = null;

    #[ORM\Column(name: 'T2_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t2_nom = null;

    #[ORM\Column(name: 'T2_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t2_pre = null;

    #[ORM\Column(name: 'T2_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t2_com = null;
}