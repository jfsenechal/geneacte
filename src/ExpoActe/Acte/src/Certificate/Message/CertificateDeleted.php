<?php

namespace ExpoActe\Acte\Certificate\Message;

class CertificateDeleted
{
    public function __construct(
        private int $certificateId
    ) {
    }

    public function getCertificateId(): int
    {
        return $this->certificateId;
    }
}
