<?php

namespace App\Certificate;

enum LabelEnum: string
{
    case BIRTH = 'N';
    case MARRIAGE = 'M';
    case DEATH = 'D';
    case OTHER = 'V';
    case OTHER_SPECIAL = 'X';

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

    public function getLabel(): string
    {
        return match ($this) {
            LabelEnum::BIRTH => 'Naissance',
            LabelEnum::MARRIAGE => 'Mariages',
            LabelEnum::DEATH => 'Décès',
            LabelEnum::OTHER => 'Divers (par défaut)',
            LabelEnum::OTHER_SPECIAL => 'Divers spécifiques',
        };
    }

    public static function getLabelGroupe(string $code): string
    {
        return match ($code) {
            LabelEnum::A0->value => 'Technique',
            LabelEnum::A1->value => 'Document',
            LabelEnum::D1->value => 'Intéressé',
            LabelEnum::D2->value => 'Parents intéressé',
            LabelEnum::F1->value => 'Second intéressé',
            LabelEnum::F2->value => 'Parents 2d intéressé',
            LabelEnum::T1->value => 'Témoins',
            LabelEnum::V1->value => 'Références',
            LabelEnum::W1->value => 'Crédits',
            LabelEnum::X0->value => 'Gestion',
            default => 'Group name not found'
        };
    }

    function files():array
    {
        return [LabelEnum::BIRTH, LabelEnum::MARRIAGE, LabelEnum::DEATH, LabelEnum::OTHER, LabelEnum::OTHER_SPECIAL];
    }

}
