<?php

namespace ExpoActe\Acte\User;

enum UserStatusEnum: string
{
    case AWAITING_ACTIVATION = 'W';
    case AWAITING_APPROVAL = 'A';
    case GRANTED = 'N';
    case DENIED = 'B';

    public function getLabelByValue(string $value): string
    {
        return match ($value) {
            self::AWAITING_ACTIVATION->value => self::AWAITING_ACTIVATION->value . ': Attente d\'activation',
            self::AWAITING_APPROVAL->value => self::AWAITING_APPROVAL->value . ': Attente d\'approbation',
            self::GRANTED->value => self::GRANTED->value . ': Accès autorisé',
            self::DENIED->value => self::DENIED->value . ': Accès bloqué',
            default => 'Label not found'
        };
    }

    public function getLabel(): string
    {
        return self::getLabelByValue($this->value);
    }
}
