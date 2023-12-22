<?php

namespace ExpoActe\Acte\User;

enum ScoringSystemEnum: int
{
    case FREEDOM = 0;
    case AUTO = 1;
    case MANUAL = 2;

    public function getLabelByValue(int $number): string
    {
        return match ($number) {
            self::FREEDOM->value => self::FREEDOM->value.': Accès libre',
            self::AUTO->value => self::AUTO->value.': Recharge manuelle',
            self::MANUAL->value => self::MANUAL->value.': Recharge automatique',
            default => 'Label not found'
        };
    }

    public function getLabel(): string
    {
        return self::getLabelByValue($this->value);
    }
}