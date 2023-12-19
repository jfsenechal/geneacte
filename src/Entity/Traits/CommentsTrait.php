<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait CommentsTrait
{

    #[ORM\Column(name: 'COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $com = null;

    #[ORM\Column(name: 'COMGEN', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $comgen = null;
}