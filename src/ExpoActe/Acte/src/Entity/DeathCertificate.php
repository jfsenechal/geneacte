<?php

namespace ExpoActe\Acte\Entity;

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
use ExpoActe\Acte\Entity\Traits\TimestampTrait;
use ExpoActe\Acte\Entity\Traits\TypeTrait;
use ExpoActe\Acte\Entity\Traits\UuidTrait;
use ExpoActe\Acte\Entity\Traits\WitnessesTrait;
use ExpoActe\Acte\Repository\DeathRepository;

#[ORM\Table(name: 'act_dec3')]
#[ORM\Index(name: 'NOM', columns: ['NOM'])]
#[ORM\Index(name: 'IDNIM', columns: ['IDNIM'])]
#[ORM\Index(name: 'ORI', columns: ['ORI'])]
#[ORM\Index(name: 'C_NOM', columns: ['C_NOM'])]
#[ORM\Index(name: 'COM_DEP', columns: ['COMMUNE', 'DEPART'])]
#[ORM\Index(name: 'P_NOM', columns: ['P_NOM'])]
#[ORM\Index(name: 'LADATE', columns: ['LADATE'])]
#[ORM\Index(name: 'M_NOM', columns: ['M_NOM'])]
#[ORM\Entity(repositoryClass: DeathRepository::class)]
class DeathCertificate implements CertificateInterface
{
    use IdTrait;
    use UuidTrait;
    use IdentityTrait;
    use SexeTrait;
    use ParentsTrait;
    use WitnessesTrait;
    use CreditTrait;
    use TimestampTrait;
    use CommentsTrait;
    use PhotosTrait;
    use TypeTrait;
    use SpouseTrait;
    use BirthTrait;

    public function __construct()
    {
        $this->typact = CertificateTypeEnum::DEATH->value;
    }
}
