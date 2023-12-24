<?php

namespace ExpoActe\Acte\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait TimestampTrait
{
    #[ORM\Column(name: 'LADATE', type: Types::DATE_MUTABLE, nullable: true, options: [
        'default' => '1001-01-01',
    ])]
    public ?\DateTimeInterface $ladate = null;

    #[ORM\Column(name: 'DTDEPOT', type: Types::DATE_MUTABLE, nullable: true, options: [
        'default' => '1001-01-01',
    ])]
    public ?\DateTimeInterface $dtdepot = null;

    #[ORM\Column(name: 'DTMODIF', type: Types::DATE_MUTABLE, nullable: true, options: [
        'default' => '1001-01-01',
    ])]
    public ?\DateTimeInterface $dtmodif = null;
}
