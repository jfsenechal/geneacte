<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait PhotosTrait
{
    #[ORM\Column(name: 'IDNIM', type: Types::INTEGER, nullable: true)]
    public int $idnim = 0;

    #[ORM\Column(name: 'PHOTOS', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $photos = null;

}