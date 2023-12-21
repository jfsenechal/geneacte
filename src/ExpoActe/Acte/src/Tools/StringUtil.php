<?php

namespace ExpoActe\Acte\Tools;

class StringUtil
{
    public static function transformToBoolean(string|bool|null $valeur): ?bool
    {
        if (is_bool($valeur) || $valeur === null) {
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