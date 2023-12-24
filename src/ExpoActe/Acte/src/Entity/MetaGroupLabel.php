<?php

namespace ExpoActe\Acte\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ExpoActe\Acte\Label\LabelGroupEnum;
use Symfony\Component\Form\FormView;

#[ORM\Table(name: 'act_mgrplg')]
#[ORM\Entity]
class MetaGroupLabel
{
    #[ORM\Column(name: 'id', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;

    #[ORM\Column(name: 'grp', type: Types::STRING, length: 2, nullable: false, options: ['fixed' => true])]
    public string $grp;

    #[ORM\Column(name: 'dtable', type: Types::STRING, length: 1, nullable: false, options: ['fixed' => true])]
    public string $dtable;

    #[ORM\Column(name: 'lg', type: Types::STRING, length: 2, nullable: false, options: ['fixed' => true])]
    public string $lg;

    #[ORM\Column(name: 'sigle', type: Types::STRING, length: 5, nullable: true)]
    public ?string $sigle = null;

    #[ORM\Column(name: 'getiq', type: Types::STRING, length: 140, nullable: false)]
    public string $getiq;

    /**
     * To get original name
     */
    public ?LabelGroupEnum $labelGroupEnum = null;

    /**
     * @var FormView[] $fields
     */
    public array $fields = [];

}
