<?php

namespace ExpoActe\Acte\Parameter;

enum ParameterEnum: string
{
    case CHECKBOX = 'B';
    case CHAR = 'C';
    case LIST = 'L';
    case NUMERIC = 'N';
    case TEXTAREA = 'T';

    public static function getSize(string $type): int
    {
        return match ($type) {
            ParameterEnum::TEXTAREA->value => 1000,
            ParameterEnum::CHAR->value => 50,
            ParameterEnum::LIST->value, ParameterEnum::NUMERIC->value => 5,
            default => 1
        };
    }
}
