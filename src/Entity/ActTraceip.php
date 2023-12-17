<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActTraceip
 *
 * @ORM\Table(name="act_traceip", indexes={@ORM\Index(name="ip", columns={"ip"})})
 * @ORM\Entity
 */
class ActTraceip
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ua", type="string", length=255, nullable=false)
     */
    private $ua = '';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=50, nullable=false)
     */
    private $ip = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="login", type="string", length=15, nullable=true)
     */
    private $login;

    /**
     * @var int
     *
     * @ORM\Column(name="datetime", type="integer", nullable=false)
     */
    private $datetime;

    /**
     * @var int
     *
     * @ORM\Column(name="cpt", type="integer", nullable=false)
     */
    private $cpt = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="locked", type="smallint", nullable=false)
     */
    private $locked = '0';


}
