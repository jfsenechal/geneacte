<?php

namespace ExpoActe\Acte\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait SurnameTrait
{
    #[ORM\Column(name: 'CP_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cp_nom = null;

    #[ORM\Column(name: 'CP_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cp_pre = null;

    #[ORM\Column(name: 'CP_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cp_com = null;

    #[ORM\Column(name: 'CP_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cp_pro = null;

    #[ORM\Column(name: 'CM_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cm_nom = null;

    #[ORM\Column(name: 'CM_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cm_pre = null;

    #[ORM\Column(name: 'CM_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cm_com = null;

    #[ORM\Column(name: 'CM_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cm_pro = null;

}