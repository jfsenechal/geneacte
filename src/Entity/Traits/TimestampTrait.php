<?php

namespace App\Entity\Traits;

use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait TimestampTrait
{
    /**
     * @var DateTimeInterface|null
     */
    #[ORM\Column(name: 'LADATE', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '1001-01-01'])]
    public string $ladate = '1001-01-01';

    /**
     * @var DateTimeInterface|null
     */
    #[ORM\Column(name: 'DTDEPOT', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '1001-01-01'])]
    public string $dtdepot = '1001-01-01';

    /**
     * @var DateTimeInterface|null
     */
    #[ORM\Column(name: 'DTMODIF', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '1001-01-01'])]
    public string $dtmodif = '1001-01-01';

}