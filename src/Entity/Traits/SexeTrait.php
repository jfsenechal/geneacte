<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait SexeTrait
{
    #[ORM\Column(name: 'SEXE', type: Types::STRING, length: 1, nullable: true, options: ['fixed' => true])]
    public ?string $sexe = null;
}