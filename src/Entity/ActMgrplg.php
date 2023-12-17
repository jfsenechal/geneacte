<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActMgrplg
 *
 * @ORM\Table(name="act_mgrplg")
 * @ORM\Entity
 */
class ActMgrplg
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
     * @ORM\Column(name="grp", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $grp;

    /**
     * @var string
     *
     * @ORM\Column(name="dtable", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $dtable;

    /**
     * @var string
     *
     * @ORM\Column(name="lg", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $lg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sigle", type="string", length=5, nullable=true)
     */
    private $sigle;

    /**
     * @var string
     *
     * @ORM\Column(name="getiq", type="string", length=30, nullable=false)
     */
    private $getiq;


}
