<?php

namespace ExpoActe\Acte\Twig\Runtime;

use ExpoActe\Acte\Certificate\LabelEnum;
use ExpoActe\Acte\Entity\Parameter;
use Twig\Extension\RuntimeExtensionInterface;

class ExpoActeExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {

    }

    public function groupName(string $value): string
    {
        return LabelEnum::getLabelGroupe($value);
    }

    public function parameterList(Parameter $parameter): array
    {
        if ($parameter->listval) {
            $list = explode(";", $parameter->listval);
            if (count($list) > 0) {
                return $list;
            }
        }

        return [];
    }
}
