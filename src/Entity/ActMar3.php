<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActMar3
 *
 * @ORM\Table(name="act_mar3", indexes={@ORM\Index(name="COM_DEP", columns={"COMMUNE", "DEPART"}), @ORM\Index(name="CM_NOM", columns={"CM_NOM"}), @ORM\Index(name="P_NOM", columns={"P_NOM"}), @ORM\Index(name="LADATE", columns={"LADATE"}), @ORM\Index(name="ORI", columns={"ORI"}), @ORM\Index(name="M_NOM", columns={"M_NOM"}), @ORM\Index(name="NOM", columns={"NOM"}), @ORM\Index(name="IDNIM", columns={"IDNIM"}), @ORM\Index(name="C_ORI", columns={"C_ORI"}), @ORM\Index(name="CP_NOM", columns={"CP_NOM"}), @ORM\Index(name="C_NOM", columns={"C_NOM"})})
 * @ORM\Entity
 */
class ActMar3
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
     * @ORM\Column(name="TYPACT", type="string", length=1, nullable=true, options={"default"="M"})
     */
    private $typact = 'M';

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
     * @ORM\Column(name="ORI", type="string", length=35, nullable=true)
     */
    private $ori;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DNAIS", type="string", length=10, nullable=true)
     */
    private $dnais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AGE", type="string", length=15, nullable=true)
     */
    private $age;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COM", type="string", length=70, nullable=true)
     */
    private $com;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRO", type="string", length=35, nullable=true)
     */
    private $pro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EXCON", type="string", length=50, nullable=true)
     */
    private $excon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EXC_PRE", type="string", length=35, nullable=true)
     */
    private $excPre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EXC_COM", type="string", length=70, nullable=true)
     */
    private $excCom;

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
     * @ORM\Column(name="C_NOM", type="string", length=30, nullable=true)
     */
    private $cNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_PRE", type="string", length=35, nullable=true)
     */
    private $cPre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_ORI", type="string", length=35, nullable=true)
     */
    private $cOri;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_DNAIS", type="string", length=10, nullable=true)
     */
    private $cDnais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_AGE", type="string", length=8, nullable=true)
     */
    private $cAge;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_COM", type="string", length=70, nullable=true)
     */
    private $cCom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_PRO", type="string", length=30, nullable=true)
     */
    private $cPro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_EXCON", type="string", length=50, nullable=true)
     */
    private $cExcon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_X_PRE", type="string", length=35, nullable=true)
     */
    private $cXPre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_X_COM", type="string", length=70, nullable=true)
     */
    private $cXCom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CP_NOM", type="string", length=30, nullable=true)
     */
    private $cpNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CP_PRE", type="string", length=35, nullable=true)
     */
    private $cpPre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CP_COM", type="string", length=70, nullable=true)
     */
    private $cpCom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CP_PRO", type="string", length=35, nullable=true)
     */
    private $cpPro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CM_NOM", type="string", length=30, nullable=true)
     */
    private $cmNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CM_PRE", type="string", length=35, nullable=true)
     */
    private $cmPre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CM_COM", type="string", length=70, nullable=true)
     */
    private $cmCom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CM_PRO", type="string", length=35, nullable=true)
     */
    private $cmPro;

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
     * @ORM\Column(name="T3_NOM", type="string", length=30, nullable=true)
     */
    private $t3Nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T3_PRE", type="string", length=35, nullable=true)
     */
    private $t3Pre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T3_COM", type="string", length=70, nullable=true)
     */
    private $t3Com;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T4_NOM", type="string", length=30, nullable=true)
     */
    private $t4Nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T4_PRE", type="string", length=35, nullable=true)
     */
    private $t4Pre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T4_COM", type="string", length=70, nullable=true)
     */
    private $t4Com;

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
