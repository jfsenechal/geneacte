<?php

namespace ExpoActe\Acte\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ExpoActe\Acte\Entity\Traits\UuidTrait;

#[ORM\Table(name: 'act_params')]
#[ORM\Entity]
class Parameter
{
    use UuidTrait;

    #[ORM\Column(name: 'param', type: Types::STRING, length: 25, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public string $param = '';

    #[ORM\Column(name: 'groupe', type: Types::STRING, length: 140, nullable: false)]
    public string $groupe = '';

    #[ORM\Column(name: 'ordre', type: Types::INTEGER, nullable: false, options: [
        'default' => '100',
    ])]
    public int $ordre = 100;

    #[ORM\Column(name: 'type', type: Types::STRING, length: 1, nullable: false, options: [
        'default' => 'C',
        'fixed' => true,
    ])]
    public string $type = 'C';

    #[ORM\Column(name: 'valeur', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $valeur = null;

    #[ORM\Column(name: 'listval', type: Types::STRING, length: 255, nullable: false)]
    public string $listval = '';

    #[ORM\Column(name: 'libelle', type: Types::STRING, length: 250, nullable: false)]
    public string $libelle = '';

    #[ORM\Column(name: 'aide', type: Types::TEXT, length: 65535, nullable: false)]
    public string $aide;

    public function __toString(): string
    {
        return $this->libelle;
    }
}
