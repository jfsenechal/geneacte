<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'act_metadb')]
#[ORM\UniqueConstraint(name: 'ZID', columns: ['ZID'])]
#[ORM\Entity]
class Metadb
{
    #[ORM\Column(name: 'id', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;

    #[ORM\Column(name: 'ZID', type: Types::INTEGER, nullable: false)]
    public int $zid;

    #[ORM\Column(name: 'dtable', type: Types::STRING, length: 1, nullable: false)]
    public string $dtable;

    #[ORM\Column(name: 'zone', type: Types::STRING, length: 15, nullable: false)]
    public string $zone;

    #[ORM\Column(name: 'groupe', type: Types::STRING, length: 3, nullable: false)]
    public string $groupe;

    #[ORM\Column(name: 'bloc', type: Types::STRING, nullable: false)]
    public string $bloc = '0';

    #[ORM\Column(name: 'typ', type: Types::STRING, length: 3, nullable: false)]
    public string $typ;

    #[ORM\Column(name: 'taille', type: Types::INTEGER, nullable: false)]
    public int $taille;

    #[ORM\Column(name: 'OV2', type: Types::INTEGER, nullable: false)]
    public int $ov2;

    #[ORM\Column(name: 'OV3', type: Types::INTEGER, nullable: false)]
    public int $ov3;

    #[ORM\Column(name: 'oblig', type: Types::STRING, length: 1, nullable: false, options: [
        'default' => 'Y',
        'fixed' => true,
    ])]
    public string $oblig = 'Y';

    #[ORM\Column(name: 'affich', type: Types::STRING, length: 1, nullable: false, options: [
        'default' => 'F',
        'fixed' => true,
    ])]
    public string $affich = 'F';

    public ?MetaLabel $label = null;
}
