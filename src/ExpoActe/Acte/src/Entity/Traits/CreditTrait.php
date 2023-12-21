<?php

namespace ExpoActe\Acte\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait CreditTrait
{

    #[ORM\Column(name: 'DEPOSANT', type: Types::INTEGER, nullable: true)]
    public ?int $deposant = null;

    #[ORM\Column(name: 'PHOTOGRA', type: Types::STRING, length: 40, nullable: true)]
    public ?string $photogra = null;

    #[ORM\Column(name: 'RELEVEUR', type: Types::STRING, length: 140, nullable: true)]
    public ?string $releveur = null;

    #[ORM\Column(name: 'VERIFIEU', type: Types::STRING, length: 140, nullable: true)]
    public ?string $verifieu = null;

}