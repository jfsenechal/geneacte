<?php

namespace ExpoActe\Acte\Label;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Entity\Metadb;

class LabelDto
{
    /**
     * @var Collection<Metadb>
     */
    public Collection $metasLabel;

    public function __construct(
        public ?CertificateTypeEnum $certificateEnum,
        array $metasLabel
    ) {
        $this->metasLabel = new ArrayCollection($metasLabel);
    }
}
