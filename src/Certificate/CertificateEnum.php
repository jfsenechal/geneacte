<?php

namespace App\Certificate;

enum CertificateEnum: string
{
    case BIRTH = 'N';
    case DEATH = 'D';
    case DIVORCE = 'V';
    case MARRIAGE = 'M';

    public function getLabel(): string
    {
        return match ($this) {
            CertificateEnum::BIRTH => 'Naissance',
            CertificateEnum::MARRIAGE => 'Mariages',
            CertificateEnum::DEATH => 'Décès',
            CertificateEnum::DIVORCE => 'Divorce',
        };
    }
}
