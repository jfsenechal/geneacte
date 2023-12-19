<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait BirthTrait
{
    #[ORM\Column(name: 'DNAIS', type: Types::STRING, length: 10, nullable: true)]
    public ?string $dnais = null;

    #[ORM\Column(name: 'ORI', type: Types::STRING, length: 70, nullable: true)]
    public ?string $ori = null;

    #[ORM\Column(name: 'AGE', type: Types::STRING, length: 15, nullable: true)]
    public ?string $age = null;

    #[ORM\Column(name: 'PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pro = null;
}