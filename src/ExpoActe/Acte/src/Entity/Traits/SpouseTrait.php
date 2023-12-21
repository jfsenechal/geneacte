<?php

namespace ExpoActe\Acte\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait SpouseTrait
{
    #[ORM\Column(name: 'C_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cNom = null;

    #[ORM\Column(name: 'C_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cPre = null;

    #[ORM\Column(name: 'C_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cCom = null;

    #[ORM\Column(name: 'C_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cPro = null;
}