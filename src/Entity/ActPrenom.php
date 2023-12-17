<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActPrenom
 *
 * @ORM\Table(name="act_prenom")
 * @ORM\Entity
 */
class ActPrenom
{
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prenom = '';


}
