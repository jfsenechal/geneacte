<?php

namespace ExpoActe\Acte\Label;

use ExpoActe\Acte\Certificate\CertificateEnum;
use ExpoActe\Acte\Entity\Metadb;

class LabelDto
{
    /**
     * @var Metadb[]
     */
    public array $metasLabel = [];

    public function __construct(public ?CertificateEnum $certificateEnum)
    {
    }

    public function __get(string $zid)
    {
        return $this->metasLabel[$zid];
    }

}