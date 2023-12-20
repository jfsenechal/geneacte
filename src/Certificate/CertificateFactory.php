<?php

namespace App\Certificate;

use App\Entity\ActDec3;
use App\Entity\ActDiv3;
use App\Entity\ActMar3;
use App\Entity\ActNai3;

class CertificateFactory
{
    public static function createMarriage(): ActMar3
    {
        return new ActMar3();
    }

    public static function createBirth(): ActNai3
    {
        return new ActNai3();
    }

    public static function createDivorce(): ActDiv3
    {
        return new ActDiv3();
    }

    public static function createDeath(): ActDec3
    {
        return new ActDec3();
    }
}