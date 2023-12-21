<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'act_metalg')]
#[ORM\UniqueConstraint(name: 'ZID', columns: ['ZID', 'lg'])]
#[ORM\Entity]
class MetaLabel
{
    #[ORM\Column(name: 'id', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;

    #[ORM\Column(name: 'ZID', type: Types::INTEGER, nullable: false)]
    public int $zid;

    #[ORM\Column(name: 'lg', type: Types::STRING, length: 3, nullable: false)]
    public string $lg;

    #[ORM\Column(name: 'etiq', type: Types::STRING, length: 140, nullable: false)]
    public string $etiq;

    #[ORM\Column(name: 'aide', type: Types::STRING, length: 140, nullable: true)]
    public ?string $aide = null;

    public Metadb|null $meta = null;

}
