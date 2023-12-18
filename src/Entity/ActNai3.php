<?php

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Entity\Traits\UuidTrait;
use Doctrine\DBAL\Types\Types;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActNai3
 */
#[ORM\Table(name: 'act_nai3')]
#[ORM\Index(name: 'LADATE', columns: ['LADATE'])]
#[ORM\Index(name: 'M_NOM', columns: ['M_NOM'])]
#[ORM\Index(name: 'IDNIM', columns: ['IDNIM'])]
#[ORM\Index(name: 'COM_DEP', columns: ['COMMUNE', 'DEPART'])]
#[ORM\Index(name: 'NOM', columns: ['NOM'])]
#[ORM\Index(name: 'P_NOM', columns: ['P_NOM'])]
#[ORM\Entity]
class ActNai3
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

    #[ORM\Column(name: 'TYPACT', type: Types::STRING, length: 1, nullable: true, options: ['default' => 'N'])]
    public string $typact = 'N';

    #[ORM\Column(name: 'DATETXT', type: Types::STRING, length: 10, nullable: true)]
    public ?string $datetxt = null;

    #[ORM\Column(name: 'DREPUB', type: Types::STRING, length: 25, nullable: true)]
    public ?string $drepub = null;

    #[ORM\Column(name: 'COTE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cote = null;

    #[ORM\Column(name: 'LIBRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $libre = null;

    #[ORM\Column(name: 'NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $nom = null;

    #[ORM\Column(name: 'PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pre = null;

    #[ORM\Column(name: 'SEXE', type: Types::STRING, length: 1, nullable: true, options: ['fixed' => true])]
    public ?string $sexe = null;

    #[ORM\Column(name: 'COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $com = null;

    #[ORM\Column(name: 'P_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pNom = null;

    #[ORM\Column(name: 'P_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pPre = null;

    #[ORM\Column(name: 'P_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pCom = null;

    #[ORM\Column(name: 'P_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $pPro = null;

    #[ORM\Column(name: 'M_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $mNom = null;

    #[ORM\Column(name: 'M_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $mPre = null;

    #[ORM\Column(name: 'M_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $mCom = null;

    #[ORM\Column(name: 'M_PRO', type: Types::STRING, length: 140, nullable: true)]
    public ?string $mPro = null;

    #[ORM\Column(name: 'T1_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t1Nom = null;

    #[ORM\Column(name: 'T1_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t1Pre = null;

    #[ORM\Column(name: 'T1_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t1Com = null;

    #[ORM\Column(name: 'T2_NOM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t2Nom = null;

    #[ORM\Column(name: 'T2_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $t2Pre = null;

    #[ORM\Column(name: 'T2_COM', type: Types::STRING, length: 140, nullable: true)]
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

    #[ORM\Column(name: 'DEPOSANT', type: Types::INTEGER, nullable: true)]
    public ?int $deposant = null;

    #[ORM\Column(name: 'PHOTOGRA', type: Types::STRING, length: 40, nullable: true)]
    public ?string $photogra = null;

    #[ORM\Column(name: 'RELEVEUR', type: Types::STRING, length: 140, nullable: true)]
    public ?string $releveur = null;

    #[ORM\Column(name: 'VERIFIEU', type: Types::STRING, length: 140, nullable: true)]
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

    public function getName():string
    {
        return $this->t1Nom;
    }
}
