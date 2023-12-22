<?php

namespace ExpoActe\Acte\Certificate;

enum CertificateEnum: string
{
    case BIRTH = 'N';
    case DEATH = 'D';
    case MARRIAGE = 'M';
    case OTHER = 'V';
    case OTHER_SPECIAL = 'X';

    public function getLabel(): string
    {
        return match ($this) {
            CertificateEnum::BIRTH => 'Naissance',
            CertificateEnum::MARRIAGE => 'Mariages',
            CertificateEnum::DEATH => 'Décès',
            CertificateEnum::OTHER => 'Divers',
            CertificateEnum::OTHER_SPECIAL => 'Divers spéciales',
        };
    }

    /**
     * @return array<string, string>
     */
    public static function getTypes(): array
    {
        $types = [];
        foreach (self::cases() as $type) {
            $types[$type->value] = $type->getLabel();
        }

        return $types;
    }

    /**
     * @return array<int, self>
     */
    function files(): array
    {
        return [self::BIRTH, self::MARRIAGE, self::DEATH, self::OTHER, self::OTHER_SPECIAL];
    }
}
