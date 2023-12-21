<?php

namespace App\Entity;

use App\Certificate\CertificateEnum;
use App\Entity\Traits\BirthTrait;
use App\Entity\Traits\CommentsTrait;
use App\Entity\Traits\CreditTrait;
use App\Entity\Traits\SpouseTrait;
use App\Entity\Traits\IdentityTrait;
use App\Entity\Traits\IdTrait;
use App\Entity\Traits\ParentsTrait;
use App\Entity\Traits\PhotosTrait;
use App\Entity\Traits\SexeTrait;
use App\Entity\Traits\TimestampTrait;
use App\Entity\Traits\SurnameTrait;
use App\Entity\Traits\TypeTrait;
use App\Entity\Traits\UuidTrait;
use App\Entity\Traits\Witnesses2Trait;
use App\Entity\Traits\WitnessesTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

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
class OtherCertificate
{
    use IdTrait, UuidTrait, IdentityTrait, SexeTrait, ParentsTrait, WitnessesTrait, Witnesses2Trait,
        CreditTrait, TimestampTrait, CommentsTrait, PhotosTrait, TypeTrait, SurnameTrait, SpouseTrait, BirthTrait;

    #[ORM\Column(name: 'SIGLE', type: Types::STRING, length: 5, nullable: true)]
    public ?string $sigle = null;

    #[ORM\Column(name: 'LIBELLE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $libelle = null;

    #[ORM\Column(name: 'EXCON', type: Types::STRING, length: 140, nullable: true)]
    public ?string $excon = null;

    #[ORM\Column(name: 'EXC_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $excPre = null;

    #[ORM\Column(name: 'EXC_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $excCom = null;

    #[ORM\Column(name: 'C_SEXE', type: Types::STRING, length: 1, nullable: true, options: ['fixed' => true])]
    public ?string $cSexe = null;

    #[ORM\Column(name: 'C_ORI', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cOri = null;

    #[ORM\Column(name: 'C_DNAIS', type: Types::STRING, length: 10, nullable: true)]
    public ?string $cDnais = null;

    #[ORM\Column(name: 'C_AGE', type: Types::STRING, length: 8, nullable: true)]
    public ?string $cAge = null;

    #[ORM\Column(name: 'C_EXCON', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cExcon = null;

    #[ORM\Column(name: 'C_X_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cXPre = null;

    #[ORM\Column(name: 'C_X_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $cXCom = null;

    public function __construct()
    {
        $this->typact = CertificateEnum::OTHER->value;
    }
}
