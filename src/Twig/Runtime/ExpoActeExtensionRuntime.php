<?php

namespace App\Twig\Runtime;

use App\Certificate\LabelEnum;
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
