<?php

namespace ExpoActe\Acte\Geolocation;

enum GeolocationEnum: string
{
    case AUTO = 'A';
    case MANUAL = 'M';
    case NOT_DEFINED = 'N';

    public function getLabel(): string
    {
        return self::getLabelByValue($this->value);
    }

    public function getLabelByValue(string $value): string
    {
        return match ($value) {
            self::AUTO->value => 'Auto',
            self::MANUAL->value => 'Manuel',
            self::NOT_DEFINED->value => 'Non définie',
            default => 'Label not found'
        };
    }
}
