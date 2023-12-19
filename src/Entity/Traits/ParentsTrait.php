<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


trait ParentsTrait
{

    #[ORM\Column(name: 'P_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pNom = null;

    #[ORM\Column(name: 'P_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pPre = null;

    #[ORM\Column(name: 'P_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pCom = null;

    #[ORM\Column(name: 'P_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pPro = null;

    #[ORM\Column(name: 'M_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $mNom = null;

    #[ORM\Column(name: 'M_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $mPre = null;

    #[ORM\Column(name: 'M_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $mCom = null;

    #[ORM\Column(name: 'M_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $mPro = null;

}