<?php

namespace ExpoActe\Acte\Security;

enum RoleEnum: int
{
    case MUNICIPALITIES = 1;
    case SURNAMES = 2;
    case ACTE_LIST = 3;
    case ACTE_DETAIL_LIMIT = 4;
    case ACTE_DETAIL_NO_LIMIT = 5;
    case ACTE_IMPORT = 6;
    case ACTE_ADD = 7;
    case ACTE_ADMINISTRATOR = 8;
    case USER_ADMINISTRATOR = 9;

    public static function getLabelByValue(int $number): string
    {
        return match ($number) {
            self::MUNICIPALITIES->value => 'Liste des communes',
            self::SURNAMES->value => 'Liste des patronymes',
            self::ACTE_LIST->value => 'Table des actes',
            self::ACTE_DETAIL_LIMIT->value => ' Détails des actes (avec limites)',
            self::ACTE_DETAIL_NO_LIMIT->value => 'Détails sans limitation',
            self::ACTE_IMPORT->value => 'Chargement NIMEGUE et CSV',
            self::ACTE_ADD->value => 'Ajout d\'actes',
            self::ACTE_ADMINISTRATOR->value => 'Administration tous actes',
            self::USER_ADMINISTRATOR->value => 'Gestion des utilisateurs',
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
