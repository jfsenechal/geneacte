<?php

namespace ExpoActe\Acte\Certificate;

enum CertificateTypeEnum: string
{
    case BIRTH = 'N';
    case DEATH = 'D';
    case MARRIAGE = 'M';
    case OTHER = 'V';
    case OTHER_SPECIAL = 'X';

    public function getLabel(): string
    {
        return match ($this) {
            CertificateTypeEnum::BIRTH => 'Naissance',
            CertificateTypeEnum::MARRIAGE => 'Mariages',
            CertificateTypeEnum::DEATH => 'Décès',
            CertificateTypeEnum::OTHER => 'Divers',
            CertificateTypeEnum::OTHER_SPECIAL => 'Divers spéciales',
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
    public function files(): array
    {
        return [self::BIRTH, self::MARRIAGE, self::DEATH, self::OTHER, self::OTHER_SPECIAL];
    }
}
