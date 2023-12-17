<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActPrenom
 */
#[ORM\Table(name: 'act_prenom')]
#[ORM\Entity]
class ActPrenom
{
    #[ORM\Column(name: 'prenom', type: Types::STRING, length: 30, nullable: false, options: ['fixed' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public string $prenom = '';


}
