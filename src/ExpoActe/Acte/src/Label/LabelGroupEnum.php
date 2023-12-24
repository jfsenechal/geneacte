<?php

namespace ExpoActe\Acte\Label;

enum LabelGroupEnum: string
{
    case A0 = 'A0';
    case A1 = 'A1';
    case D1 = 'D1';
    case D2 = 'D2';
    case F1 = 'F1';
    case F2 = 'F2';
    case T1 = 'T1';
    case V1 = 'V1';
    case W1 = 'W1';
    case X0 = 'X0';

    public static function getLabelByValue(string $code): string
    {
        return match ($code) {
            LabelGroupEnum::A0->value => 'Technique',
            LabelGroupEnum::A1->value => 'Document',
            LabelGroupEnum::D1->value => 'Intéressé',
            LabelGroupEnum::D2->value => 'Parents intéressé',
            LabelGroupEnum::F1->value => 'Second intéressé',
            LabelGroupEnum::F2->value => 'Parents 2d intéressé',
            LabelGroupEnum::T1->value => 'Témoins',
            LabelGroupEnum::V1->value => 'Références',
            LabelGroupEnum::W1->value => 'Crédits',
            LabelGroupEnum::X0->value => 'Gestion',
            default => 'Group name not found'
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
