<?php

namespace ExpoActe\Acte\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


trait ParentsTrait
{
    #[ORM\Column(name: 'P_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $p_nom = null;

    #[ORM\Column(name: 'P_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $p_pre = null;

    #[ORM\Column(name: 'P_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $p_com = null;

    #[ORM\Column(name: 'P_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $p_pro = null;

    #[ORM\Column(name: 'M_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $m_nom = null;

    #[ORM\Column(name: 'M_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $m_pre = null;

    #[ORM\Column(name: 'M_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $m_com = null;

    #[ORM\Column(name: 'M_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $m_pro = null;

}