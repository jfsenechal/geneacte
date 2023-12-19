<?php

namespace App\Parameter;

enum ParameterEnum: string
{
    case CHECKBOX = 'B';
    case C = 'C';
    case LIST = 'L';
    case N = 'N';
    case T = 'T';

    public static function getSize(string $type): int
    {
        return match ($type) {
            ParameterEnum::T->value => 1000,
            ParameterEnum::C->value => 50,
            ParameterEnum::LIST->value, ParameterEnum::N->value => 5,
            default => 1
        };

    }
}
