<?php

namespace ExpoActe\Acte\Tools;

class StringUtil
{
    public static function transformToBoolean(string|null $valeur): ?bool
    {
        if ($valeur === null) {
            return $valeur;
        }

        if ($valeur == "Y") {
            return true;
        }

        if ($valeur == "1") {
            return true;
        }

        return false;
    }
}