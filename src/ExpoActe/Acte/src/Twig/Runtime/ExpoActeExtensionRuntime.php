<?php

namespace ExpoActe\Acte\Twig\Runtime;

use ExpoActe\Acte\Certificate\LabelEnum;
use Twig\Extension\RuntimeExtensionInterface;

class ExpoActeExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {

    }

    public function groupName(string $value)
    {
        return LabelEnum::getLabelGroupe($value);
    }
}
