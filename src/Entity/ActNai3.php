<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActNai3
 *
 * @ORM\Table(name="act_nai3", indexes={@ORM\Index(name="LADATE", columns={"LADATE"}), @ORM\Index(name="M_NOM", columns={"M_NOM"}), @ORM\Index(name="IDNIM", columns={"IDNIM"}), @ORM\Index(name="COM_DEP", columns={"COMMUNE", "DEPART"}), @ORM\Index(name="NOM", columns={"NOM"}), @ORM\Index(name="P_NOM", columns={"P_NOM"})})
 * @ORM\Entity
 */
class ActNai3
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="BIDON", type="string", length=10, nullable=true)
     */
    private $bidon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODCOM", type="string", length=12, nullable=true)
     */
    private $codcom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COMMUNE", type="string", length=40, nullable=true)
     */
    private $commune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODDEP", type="string", length=10, nullable=true)
     */
    private $coddep;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEPART", type="string", length=40, nullable=true)
     */
    private $depart;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TYPACT", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $typact = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DATETXT", type="string", length=10, nullable=true)
     */
    private $datetxt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DREPUB", type="string", length=25, nullable=true)
     */
    private $drepub;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COTE", type="string", length=40, nullable=true)
     */
    private $cote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBRE", type="string", length=50, nullable=true)
     */
    private $libre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="string", length=30, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRE", type="string", length=35, nullable=true)
     */
    private $pre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SEXE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $sexe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COM", type="string", length=70, nullable=true)
     */
    private $com;

    /**
     * @var string|null
     *
     * @ORM\Column(name="P_NOM", type="string", length=30, nullable=true)
     */
    private $pNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="P_PRE", type="string", length=35, nullable=true)
     */
    private $pPre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="P_COM", type="string", length=70, nullable=true)
     */
    private $pCom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="P_PRO", type="string", length=35, nullable=true)
     */
    private $pPro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="M_NOM", type="string", length=30, nullable=true)
     */
    private $mNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="M_PRE", type="string", length=35, nullable=true)
     */
    private $mPre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="M_COM", type="string", length=70, nullable=true)
     */
    private $mCom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="M_PRO", type="string", length=35, nullable=true)
     */
    private $mPro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T1_NOM", type="string", length=30, nullable=true)
     */
    private $t1Nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T1_PRE", type="string", length=35, nullable=true)
     */
    private $t1Pre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T1_COM", type="string", length=70, nullable=true)
     */
    private $t1Com;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T2_NOM", type="string", length=30, nullable=true)
     */
    private $t2Nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T2_PRE", type="string", length=35, nullable=true)
     */
    private $t2Pre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T2_COM", type="string", length=70, nullable=true)
     */
    private $t2Com;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COMGEN", type="text", length=65535, nullable=true)
     */
    private $comgen;

    /**
     * @var int|null
     *
     * @ORM\Column(name="IDNIM", type="integer", nullable=true)
     */
    private $idnim = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PHOTOS", type="text", length=65535, nullable=true)
     */
    private $photos;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="LADATE", type="date", nullable=true, options={"default"="1001-01-01"})
     */
    private $ladate = '1001-01-01';

    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="DEPOSANT", type="integer", nullable=true)
     */
    private $deposant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PHOTOGRA", type="string", length=40, nullable=true)
     */
    private $photogra;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RELEVEUR", type="string", length=40, nullable=true)
     */
    private $releveur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VERIFIEU", type="string", length=40, nullable=true)
     */
    private $verifieu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DTDEPOT", type="date", nullable=true, options={"default"="1001-01-01"})
     */
    private $dtdepot = '1001-01-01';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DTMODIF", type="date", nullable=true, options={"default"="1001-01-01"})
     */
    private $dtmodif = '1001-01-01';


}
