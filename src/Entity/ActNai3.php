<?php

namespace App\Entity;

use App\Entity\Traits\CommentsTrait;
use App\Entity\Traits\CreditTrait;
use App\Entity\Traits\IdentityTrait;
use App\Entity\Traits\IdTrait;
use App\Entity\Traits\ParentsTrait;
use App\Entity\Traits\PhotosTrait;
use App\Entity\Traits\SexeTrait;
use App\Entity\Traits\TimestampTrait;
use App\Entity\Traits\TypeTrait;
use App\Entity\Traits\UuidTrait;
use App\Entity\Traits\WitnessesTrait;
use Doctrine\ORM\Mapping as ORM;

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
    use IdTrait, UuidTrait, IdentityTrait, SexeTrait, ParentsTrait, WitnessesTrait, CreditTrait,
        TimestampTrait, CommentsTrait, PhotosTrait, TypeTrait;

    public function getName(): string
    {
        return $this->nom;
    }
}
