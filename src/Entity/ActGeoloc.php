<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActGeoloc
 *
 * @ORM\Table(name="act_geoloc", uniqueConstraints={@ORM\UniqueConstraint(name="COMMUNE", columns={"COMMUNE", "DEPART"})})
 * @ORM\Entity
 */
class ActGeoloc
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="COMMUNE", type="string", length=40, nullable=false)
     */
    private $commune = '';

    /**
     * @var string
     *
     * @ORM\Column(name="DEPART", type="string", length=40, nullable=false)
     */
    private $depart = '';

    /**
     * @var float|null
     *
     * @ORM\Column(name="LON", type="float", precision=10, scale=0, nullable=true)
     */
    private $lon;

    /**
     * @var float|null
     *
     * @ORM\Column(name="LAT", type="float", precision=10, scale=0, nullable=true)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="STATUT", type="string", length=1, nullable=false, options={"default"="N"})
     */
    private $statut = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOTE_N", type="text", length=65535, nullable=true)
     */
    private $noteN;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOTE_M", type="text", length=65535, nullable=true)
     */
    private $noteM;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOTE_D", type="text", length=65535, nullable=true)
     */
    private $noteD;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOTE_V", type="text", length=65535, nullable=true)
     */
    private $noteV;


}
