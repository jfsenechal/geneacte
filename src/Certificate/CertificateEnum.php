<?php

namespace App\Certificate;

enum CertificateEnum: string
{
    case BIRTH = 'N';
    case DEAT = 'D';
    case DIVORCE = 'V';
    case MARRIAGE = 'M';
}
