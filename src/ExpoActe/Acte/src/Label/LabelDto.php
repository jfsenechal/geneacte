<?php

namespace ExpoActe\Acte\Label;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ExpoActe\Acte\Certificate\CertificateEnum;
use ExpoActe\Acte\Entity\Metadb;

class LabelDto
{
    /**
     * @var Metadb[]|Collection
     */
    public Collection $metasLabel;

    public function __construct(public ?CertificateEnum $certificateEnum)
    {
        $this->metasLabel = new ArrayCollection();
    }

}