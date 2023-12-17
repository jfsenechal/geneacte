<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActLog
 *
 * @ORM\Table(name="act_log", indexes={@ORM\Index(name="date", columns={"date"})})
 * @ORM\Entity
 */
class ActLog
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
     * @var int
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     */
    private $user = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="1001-01-01 00:00:00"})
     */
    private $date = '1001-01-01 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=40, nullable=false)
     */
    private $action = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="commune", type="string", length=30, nullable=true)
     */
    private $commune;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_actes", type="integer", nullable=true)
     */
    private $nbActes;


}
