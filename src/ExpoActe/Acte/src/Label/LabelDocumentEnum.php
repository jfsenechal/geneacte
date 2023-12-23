<?php

namespace ExpoActe\Acte\Label;

enum LabelDocumentEnum: string
{
    case NOT_EMPTY = 'F';
    case ALWAYS = 'O';
    case ADMINISTRATION = 'A';
    case UNUSE = 'M';

    public static function getLabelByValue(string $number): string
    {
        return match ($number) {
            self::NOT_EMPTY->value => 'Si non vide',
            self::ALWAYS->value => 'Toujours',
            self::ADMINISTRATION->value => 'Administrations',
            self::UNUSE->value => 'Inutilisé',
            default => 'Label not found'
        };
    }

    public function getLabel(bool $withValue = true): string
    {
        $txt = self::getLabelByValue($this->value);
        if ($withValue) {
            $txt = $this->value.': '.$txt;
        }

        return $txt;
    }
}
