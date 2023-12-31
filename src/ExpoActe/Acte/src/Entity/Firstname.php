<?php

namespace ExpoActe\Acte\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'act_prenom')]
#[ORM\Entity]
class Firstname
{
    #[ORM\Column(name: 'prenom', type: Types::STRING, length: 140, nullable: false, options: [
        'fixed' => true,
    ])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public string $prenom = '';
}
