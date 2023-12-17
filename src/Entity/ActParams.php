<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActParams
 *
 * @ORM\Table(name="act_params")
 * @ORM\Entity
 */
class ActParams
{
    /**
     * @var string
     *
     * @ORM\Column(name="param", type="string", length=25, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $param = '';

    /**
     * @var string
     *
     * @ORM\Column(name="groupe", type="string", length=30, nullable=false)
     */
    private $groupe = '';

    /**
     * @var int
     *
     * @ORM\Column(name="ordre", type="integer", nullable=false, options={"default"="100"})
     */
    private $ordre = 100;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=1, nullable=false, options={"default"="C","fixed"=true})
     */
    private $type = 'C';

    /**
     * @var string|null
     *
     * @ORM\Column(name="valeur", type="text", length=65535, nullable=true)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="listval", type="string", length=255, nullable=false)
     */
    private $listval = '';

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=250, nullable=false)
     */
    private $libelle = '';

    /**
     * @var string
     *
     * @ORM\Column(name="aide", type="text", length=65535, nullable=false)
     */
    private $aide;


}
