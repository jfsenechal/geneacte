<?php

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Entity\Traits\UuidTrait;
use Doctrine\DBAL\Types\Types;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActDiv3
 */
#[ORM\Table(name: 'act_div3')]
#[ORM\Index(name: 'NOM', columns: ['NOM'])]
#[ORM\Index(name: 'COM_DEP_LIB', columns: ['COMMUNE', 'DEPART', 'LIBELLE'])]
#[ORM\Index(name: 'C_ORI', columns: ['C_ORI'])]
#[ORM\Index(name: 'CP_NOM', columns: ['CP_NOM'])]
#[ORM\Index(name: 'C_NOM', columns: ['C_NOM'])]
#[ORM\Index(name: 'LADATE', columns: ['LADATE'])]
#[ORM\Index(name: 'PHOTOS', columns: ['PHOTOS'])]
#[ORM\Index(name: 'CM_NOM', columns: ['CM_NOM'])]
#[ORM\Index(name: 'P_NOM', columns: ['P_NOM'])]
#[ORM\Index(name: 'IDNIM', columns: ['IDNIM'])]
#[ORM\Index(name: 'ORI', columns: ['ORI'])]
#[ORM\Index(name: 'M_NOM', columns: ['M_NOM'])]
#[ORM\Entity]
class ActDiv3
{
    use IdTrait, UuidTrait;

    #[ORM\Column(name: 'BIDON', type: Types::STRING, length: 10, nullable: true)]
    public ?string $bidon = null;

    #[ORM\Column(name: 'CODCOM', type: Types::STRING, length: 12, nullable: true)]
    public ?string $codcom = null;

    #[ORM\Column(name: 'COMMUNE', type: Types::STRING, length: 40, nullable: true)]
    public ?string $commune = null;

    #[ORM\Column(name: 'CODDEP', type: Types::STRING, length: 10, nullable: true)]
    public ?string $coddep = null;

    #[ORM\Column(name: 'DEPART', type: Types::STRING, length: 40, nullable: true)]
    public ?string $depart = null;

    #[ORM\Column(name: 'TYPACT', type: Types::STRING, length: 1, nullable: true, options: ['default' => 'V'])]
    public string $typact = 'V';

    #[ORM\Column(name: 'DATETXT', type: Types::STRING, length: 10, nullable: true)]
    public ?string $datetxt = null;

    #[ORM\Column(name: 'DREPUB', type: Types::STRING, length: 25, nullable: true)]
    public ?string $drepub = null;

    #[ORM\Column(name: 'COTE', type: Types::STRING, length: 40, nullable: true)]
    public ?string $cote = null;

    #[ORM\Column(name: 'LIBRE', type: Types::STRING, length: 50, nullable: true)]
    public ?string $libre = null;

    #[ORM\Column(name: 'SIGLE', type: Types::STRING, length: 5, nullable: true)]
    public ?string $sigle = null;

    #[ORM\Column(name: 'LIBELLE', type: Types::STRING, length: 50, nullable: true)]
    public ?string $libelle = null;

    #[ORM\Column(name: 'NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $nom = null;

    #[ORM\Column(name: 'PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $pre = null;

    #[ORM\Column(name: 'SEXE', type: Types::STRING, length: 1, nullable: true, options: ['fixed' => true])]
    public ?string $sexe = null;

    #[ORM\Column(name: 'ORI', type: Types::STRING, length: 35, nullable: true)]
    public ?string $ori = null;

    #[ORM\Column(name: 'DNAIS', type: Types::STRING, length: 10, nullable: true)]
    public ?string $dnais = null;

    #[ORM\Column(name: 'AGE', type: Types::STRING, length: 15, nullable: true)]
    public ?string $age = null;

    #[ORM\Column(name: 'COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $com = null;

    #[ORM\Column(name: 'PRO', type: Types::STRING, length: 35, nullable: true)]
    public ?string $pro = null;

    #[ORM\Column(name: 'EXCON', type: Types::STRING, length: 50, nullable: true)]
    public ?string $excon = null;

    #[ORM\Column(name: 'EXC_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $excPre = null;

    #[ORM\Column(name: 'EXC_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $excCom = null;

    #[ORM\Column(name: 'P_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $pNom = null;

    #[ORM\Column(name: 'P_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $pPre = null;

    #[ORM\Column(name: 'P_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $pCom = null;

    #[ORM\Column(name: 'P_PRO', type: Types::STRING, length: 35, nullable: true)]
    public ?string $pPro = null;

    #[ORM\Column(name: 'M_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $mNom = null;

    #[ORM\Column(name: 'M_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $mPre = null;

    #[ORM\Column(name: 'M_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $mCom = null;

    #[ORM\Column(name: 'M_PRO', type: Types::STRING, length: 35, nullable: true)]
    public ?string $mPro = null;

    #[ORM\Column(name: 'C_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $cNom = null;

    #[ORM\Column(name: 'C_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $cPre = null;

    #[ORM\Column(name: 'C_SEXE', type: Types::STRING, length: 1, nullable: true, options: ['fixed' => true])]
    public ?string $cSexe = null;

    #[ORM\Column(name: 'C_ORI', type: Types::STRING, length: 35, nullable: true)]
    public ?string $cOri = null;

    #[ORM\Column(name: 'C_DNAIS', type: Types::STRING, length: 10, nullable: true)]
    public ?string $cDnais = null;

    #[ORM\Column(name: 'C_AGE', type: Types::STRING, length: 8, nullable: true)]
    public ?string $cAge = null;

    #[ORM\Column(name: 'C_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $cCom = null;

    #[ORM\Column(name: 'C_PRO', type: Types::STRING, length: 30, nullable: true)]
    public ?string $cPro = null;

    #[ORM\Column(name: 'C_EXCON', type: Types::STRING, length: 50, nullable: true)]
    public ?string $cExcon = null;

    #[ORM\Column(name: 'C_X_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $cXPre = null;

    #[ORM\Column(name: 'C_X_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $cXCom = null;

    #[ORM\Column(name: 'CP_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $cpNom = null;

    #[ORM\Column(name: 'CP_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $cpPre = null;

    #[ORM\Column(name: 'CP_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $cpCom = null;

    #[ORM\Column(name: 'CP_PRO', type: Types::STRING, length: 35, nullable: true)]
    public ?string $cpPro = null;

    #[ORM\Column(name: 'CM_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $cmNom = null;

    #[ORM\Column(name: 'CM_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $cmPre = null;

    #[ORM\Column(name: 'CM_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $cmCom = null;

    #[ORM\Column(name: 'CM_PRO', type: Types::STRING, length: 35, nullable: true)]
    public ?string $cmPro = null;

    #[ORM\Column(name: 'T1_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $t1Nom = null;

    #[ORM\Column(name: 'T1_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $t1Pre = null;

    #[ORM\Column(name: 'T1_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $t1Com = null;

    #[ORM\Column(name: 'T2_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $t2Nom = null;

    #[ORM\Column(name: 'T2_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $t2Pre = null;

    #[ORM\Column(name: 'T2_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $t2Com = null;

    #[ORM\Column(name: 'T3_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $t3Nom = null;

    #[ORM\Column(name: 'T3_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $t3Pre = null;

    #[ORM\Column(name: 'T3_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $t3Com = null;

    #[ORM\Column(name: 'T4_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $t4Nom = null;

    #[ORM\Column(name: 'T4_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $t4Pre = null;

    #[ORM\Column(name: 'T4_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $t4Com = null;

    #[ORM\Column(name: 'COMGEN', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $comgen = null;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'IDNIM', type: Types::INTEGER, nullable: true)]
    public string $idnim = '0';

    #[ORM\Column(name: 'PHOTOS', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $photos = null;

    /**
     * @var DateTimeInterface|null
     */
    #[ORM\Column(name: 'LADATE', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '1001-01-01'])]
    public string $ladate = '1001-01-01';

    #[ORM\Column(name: 'DEPOSANT', type: Types::INTEGER, nullable: true)]
    public ?int $deposant = null;

    #[ORM\Column(name: 'PHOTOGRA', type: Types::STRING, length: 40, nullable: true)]
    public ?string $photogra = null;

    #[ORM\Column(name: 'RELEVEUR', type: Types::STRING, length: 40, nullable: true)]
    public ?string $releveur = null;

    #[ORM\Column(name: 'VERIFIEU', type: Types::STRING, length: 40, nullable: true)]
    public ?string $verifieu = null;

    /**
     * @var DateTimeInterface|null
     */
    #[ORM\Column(name: 'DTDEPOT', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '1001-01-01'])]
    public string $dtdepot = '1001-01-01';

    /**
     * @var DateTimeInterface|null
     */
    #[ORM\Column(name: 'DTMODIF', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '1001-01-01'])]
    public string $dtmodif = '1001-01-01';


}
