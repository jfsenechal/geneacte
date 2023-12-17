<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActMetadb
 *
 * @ORM\Table(name="act_metadb", uniqueConstraints={@ORM\UniqueConstraint(name="ZID", columns={"ZID"})})
 * @ORM\Entity
 */
class ActMetadb
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
     * @ORM\Column(name="dtable", type="string", length=1, nullable=false)
     */
    private $dtable;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=15, nullable=false)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="groupe", type="string", length=3, nullable=false)
     */
    private $groupe;

    /**
     * @var bool
     *
     * @ORM\Column(name="bloc", type="boolean", nullable=false)
     */
    private $bloc = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="typ", type="string", length=3, nullable=false)
     */
    private $typ;

    /**
     * @var int
     *
     * @ORM\Column(name="taille", type="integer", nullable=false)
     */
    private $taille;

    /**
     * @var int
     *
     * @ORM\Column(name="OV2", type="integer", nullable=false)
     */
    private $ov2;

    /**
     * @var int
     *
     * @ORM\Column(name="OV3", type="integer", nullable=false)
     */
    private $ov3;

    /**
     * @var string
     *
     * @ORM\Column(name="oblig", type="string", length=1, nullable=false, options={"default"="Y","fixed"=true})
     */
    private $oblig = 'Y';

    /**
     * @var string
     *
     * @ORM\Column(name="affich", type="string", length=1, nullable=false, options={"default"="F","fixed"=true})
     */
    private $affich = 'F';


}
