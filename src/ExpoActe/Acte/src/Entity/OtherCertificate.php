<?php

namespace ExpoActe\Acte\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ExpoActe\Acte\Certificate\CertificateInterface;
use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Entity\Traits\BirthTrait;
use ExpoActe\Acte\Entity\Traits\CommentsTrait;
use ExpoActe\Acte\Entity\Traits\CreditTrait;
use ExpoActe\Acte\Entity\Traits\IdentityTrait;
use ExpoActe\Acte\Entity\Traits\IdTrait;
use ExpoActe\Acte\Entity\Traits\ParentsTrait;
use ExpoActe\Acte\Entity\Traits\PhotosTrait;
use ExpoActe\Acte\Entity\Traits\SexeTrait;
use ExpoActe\Acte\Entity\Traits\SpouseTrait;
use ExpoActe\Acte\Entity\Traits\SurnameTrait;
use ExpoActe\Acte\Entity\Traits\TimestampTrait;
use ExpoActe\Acte\Entity\Traits\TypeTrait;
use ExpoActe\Acte\Entity\Traits\UuidTrait;
use ExpoActe\Acte\Entity\Traits\Witnesses2Trait;
use ExpoActe\Acte\Entity\Traits\WitnessesTrait;
use ExpoActe\Acte\Repository\OtherCertificateRepository;

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
#[ORM\Entity(repositoryClass: OtherCertificateRepository::class)]
class OtherCertificate implements CertificateInterface
{
    use IdTrait;
    use UuidTrait;
    use IdentityTrait;
    use SexeTrait;
    use ParentsTrait;
    use WitnessesTrait;
    use Witnesses2Trait;
    use CreditTrait;
    use TimestampTrait;
    use CommentsTrait;
    use PhotosTrait;
    use TypeTrait;
    use SurnameTrait;
    use SpouseTrait;
    use BirthTrait;

    #[ORM\Column(name: 'SIGLE', type: Types::STRING, length: 5, nullable: true)]
    public ?string $sigle = null;

    #[ORM\Column(name: 'LIBELLE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $libelle = null;

    #[ORM\Column(name: 'EXCON', type: Types::STRING, length: 140, nullable: true)]
    public ?string $excon = null;

    #[ORM\Column(name: 'EXC_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $exc_pre = null;

    #[ORM\Column(name: 'EXC_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $exc_com = null;

    #[ORM\Column(name: 'C_SEXE', type: Types::STRING, length: 1, nullable: true, options: [
        'fixed' => true,
    ])]
    public ?string $c_sexe = null;

    #[ORM\Column(name: 'C_ORI', type: Types::STRING, length: 140, nullable: true)]
    public ?string $c_ori = null;

    #[ORM\Column(name: 'C_DNAIS', type: Types::STRING, length: 10, nullable: true)]
    public ?string $c_dnais = null;

    #[ORM\Column(name: 'C_AGE', type: Types::STRING, length: 8, nullable: true)]
    public ?string $c_age = null;

    #[ORM\Column(name: 'C_EXCON', type: Types::STRING, length: 140, nullable: true)]
    public ?string $c_excon = null;

    #[ORM\Column(name: 'C_X_PRE', type: Types::STRING, length: 140, nullable: true)]
    public ?string $c_x_pre = null;

    #[ORM\Column(name: 'C_X_COM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $c_x_com = null;

    public function __construct()
    {
        $this->typact = CertificateTypeEnum::OTHER->value;
    }
}
