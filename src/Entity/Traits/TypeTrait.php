<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait TypeTrait
{
    #[ORM\Column(name: 'TYPACT', type: Types::STRING, length: 1, nullable: true)]
    public string $typact;
}