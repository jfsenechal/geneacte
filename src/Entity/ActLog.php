<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActLog
 */
#[ORM\Table(name: 'act_log')]
#[ORM\Index(name: 'date', columns: ['date'])]
#[ORM\Entity]
class ActLog
{
    #[ORM\Column(name: 'id', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;

    #[ORM\Column(name: 'user', type: Types::INTEGER, nullable: false)]
    public string $user = '0';

    /**
     * @var DateTimeInterface
     */
    #[ORM\Column(name: 'date', type: Types::DATETIME_MUTABLE, nullable: false, options: ['default' => '1001-01-01 00:00:00'])]
    public string $date = '1001-01-01 00:00:00';

    #[ORM\Column(name: 'action', type: Types::STRING, length: 40, nullable: false)]
    public string $action = '';

    #[ORM\Column(name: 'commune', type: Types::STRING, length: 140, nullable: true)]
    public ?string $commune = null;

    #[ORM\Column(name: 'nb_actes', type: Types::INTEGER, nullable: true)]
    public ?int $nbActes = null;


}
