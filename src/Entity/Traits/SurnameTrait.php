<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait SurnameTrait
{
    #[ORM\Column(name: 'CP_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cpNom = null;

    #[ORM\Column(name: 'CP_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cpPre = null;

    #[ORM\Column(name: 'CP_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cpCom = null;

    #[ORM\Column(name: 'CP_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cpPro = null;

    #[ORM\Column(name: 'CM_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cmNom = null;

    #[ORM\Column(name: 'CM_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cmPre = null;

    #[ORM\Column(name: 'CM_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cmCom = null;

    #[ORM\Column(name: 'CM_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cmPro = null;

}