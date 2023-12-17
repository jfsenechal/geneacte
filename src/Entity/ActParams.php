<?php

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Entity\Traits\UuidTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActParams
 */
#[ORM\Table(name: 'act_params')]
#[ORM\Entity]
class ActParams
{
    use IdTrait, UuidTrait;

    #[ORM\Column(name: 'param', type: Types::STRING, length: 25, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public string $param = '';

    #[ORM\Column(name: 'groupe', type: Types::STRING, length: 30, nullable: false)]
    public string $groupe = '';

    #[ORM\Column(name: 'ordre', type: Types::INTEGER, nullable: false, options: ['default' => '100'])]
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


}
