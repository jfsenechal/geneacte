<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActTraceip
 */
#[ORM\Table(name: 'act_traceip')]
#[ORM\Index(name: 'ip', columns: ['ip'])]
#[ORM\Entity]
class ActTraceip
{
    #[ORM\Column(name: 'id', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;

    #[ORM\Column(name: 'ua', type: Types::STRING, length: 255, nullable: false)]
    public string $ua = '';

    #[ORM\Column(name: 'ip', type: Types::STRING, length: 140, nullable: false)]
    public string $ip = '';

    #[ORM\Column(name: 'login', type: Types::STRING, length: 15, nullable: true)]
    public ?string $login = null;

    #[ORM\Column(name: 'datetime', type: Types::INTEGER, nullable: false)]
    public int $datetime;

    #[ORM\Column(name: 'cpt', type: Types::INTEGER, nullable: false)]
    public string $cpt = '0';

    #[ORM\Column(name: 'locked', type: Types::SMALLINT, nullable: false)]
    public string $locked = '0';


}
