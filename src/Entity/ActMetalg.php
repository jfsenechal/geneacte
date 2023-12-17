<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActMetalg
 *
 * @ORM\Table(name="act_metalg", uniqueConstraints={@ORM\UniqueConstraint(name="ZID", columns={"ZID", "lg"})})
 * @ORM\Entity
 */
class ActMetalg
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
     * @ORM\Column(name="ZID", type="integer", nullable=false)
     */
    private $zid;

    /**
     * @var string
     *
     * @ORM\Column(name="lg", type="string", length=3, nullable=false)
     */
    private $lg;

    /**
     * @var string
     *
     * @ORM\Column(name="etiq", type="string", length=50, nullable=false)
     */
    private $etiq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="aide", type="string", length=500, nullable=true)
     */
    private $aide;


}
