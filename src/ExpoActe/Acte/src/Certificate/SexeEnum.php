<?php

namespace ExpoActe\Acte\Certificate;

enum SexeEnum: string
{
    case M = 'M';
    case F = 'F';
    case NOT_SET = '?';

    public static function getLabelByValue(string $number): string
    {
        return match ($number) {
            self::M->value => 'Masculin',
            self::F->value => 'Féminin',
            self::NOT_SET->value => 'Non précisé',
            default => 'Label not found'
        };
    }

    public function getLabel(bool $withValue = false): string
    {
        $txt = self::getLabelByValue($this->value);
        if ($withValue) {
            $txt = $this->value . ': ' . $txt;
        }

        return $txt;
    }
}
