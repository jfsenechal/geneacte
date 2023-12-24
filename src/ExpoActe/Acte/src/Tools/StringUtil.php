<?php

namespace ExpoActe\Acte\Tools;

class StringUtil
{
    public static function transformToBoolean(string|null $valeur): ?bool
    {
        if (null === $valeur) {
            return $valeur;
        }

        if ('Y' === $valeur) {
            return true;
        }

        if ('1' === $valeur) {
            return true;
        }

        return false;
    }
}
