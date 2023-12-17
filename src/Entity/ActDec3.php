<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActDec3
 */
#[ORM\Table(name: 'act_dec3')]
#[ORM\Index(name: 'NOM', columns: ['NOM'])]
#[ORM\Index(name: 'IDNIM', columns: ['IDNIM'])]
#[ORM\Index(name: 'ORI', columns: ['ORI'])]
#[ORM\Index(name: 'C_NOM', columns: ['C_NOM'])]
#[ORM\Index(name: 'COM_DEP', columns: ['COMMUNE', 'DEPART'])]
#[ORM\Index(name: 'P_NOM', columns: ['P_NOM'])]
#[ORM\Index(name: 'LADATE', columns: ['LADATE'])]
#[ORM\Index(name: 'M_NOM', columns: ['M_NOM'])]
#[ORM\Entity]
class ActDec3
{
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

    #[ORM\Column(name: 'TYPACT', type: Types::STRING, length: 1, nullable: true, options: ['default' => 'D'])]
    public string $typact = 'D';

    #[ORM\Column(name: 'DATETXT', type: Types::STRING, length: 10, nullable: true)]
    public ?string $datetxt = null;

    #[ORM\Column(name: 'DREPUB', type: Types::STRING, length: 25, nullable: true)]
    public ?string $drepub = null;

    #[ORM\Column(name: 'COTE', type: Types::STRING, length: 40, nullable: true)]
    public ?string $cote = null;

    #[ORM\Column(name: 'LIBRE', type: Types::STRING, length: 50, nullable: true)]
    public ?string $libre = null;

    #[ORM\Column(name: 'NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $nom = null;

    #[ORM\Column(name: 'PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $pre = null;

    #[ORM\Column(name: 'ORI', type: Types::STRING, length: 35, nullable: true)]
    public ?string $ori = null;

    #[ORM\Column(name: 'DNAIS', type: Types::STRING, length: 10, nullable: true)]
    public ?string $dnais = null;

    #[ORM\Column(name: 'SEXE', type: Types::STRING, length: 1, nullable: true, options: ['fixed' => true])]
    public ?string $sexe = null;

    #[ORM\Column(name: 'AGE', type: Types::STRING, length: 15, nullable: true)]
    public ?string $age = null;

    #[ORM\Column(name: 'COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $com = null;

    #[ORM\Column(name: 'PRO', type: Types::STRING, length: 35, nullable: true)]
    public ?string $pro = null;

    #[ORM\Column(name: 'C_NOM', type: Types::STRING, length: 30, nullable: true)]
    public ?string $cNom = null;

    #[ORM\Column(name: 'C_PRE', type: Types::STRING, length: 35, nullable: true)]
    public ?string $cPre = null;

    #[ORM\Column(name: 'C_COM', type: Types::STRING, length: 70, nullable: true)]
    public ?string $cCom = null;

    #[ORM\Column(name: 'C_PRO', type: Types::STRING, length: 30, nullable: true)]
    public ?string $cPro = null;

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

    #[ORM\Column(name: 'ID', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;

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
