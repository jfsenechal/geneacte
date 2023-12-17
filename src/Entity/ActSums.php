<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActSums
 *
 * @ORM\Table(name="act_sums", indexes={@ORM\Index(name="typ_lib_com_dep", columns={"TYPACT", "LIBELLE", "COMMUNE", "DEPART"})})
 * @ORM\Entity
 */
class ActSums
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
     * @ORM\Column(name="COMMUNE", type="string", length=40, nullable=false)
     */
    private $commune = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEPART", type="string", length=40, nullable=true)
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="TYPACT", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $typact = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE", type="string", length=50, nullable=true)
     */
    private $libelle;

    /**
     * @var int|null
     *
     * @ORM\Column(name="DEPOSANT", type="integer", nullable=true)
     */
    private $deposant;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DTDEPOT", type="date", nullable=true)
     */
    private $dtdepot;

    /**
     * @var int|null
     *
     * @ORM\Column(name="AN_MIN", type="integer", nullable=true)
     */
    private $anMin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="AN_MAX", type="integer", nullable=true)
     */
    private $anMax;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NB_TOT", type="integer", nullable=true)
     */
    private $nbTot;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NB_N_NUL", type="integer", nullable=true)
     */
    private $nbNNul;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NB_FIL", type="integer", nullable=true)
     */
    private $nbFil;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DER_MAJ", type="datetime", nullable=true)
     */
    private $derMaj;


}
