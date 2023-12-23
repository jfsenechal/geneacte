<?php

namespace ExpoActe\Acte\Twig\Runtime;

use ExpoActe\Acte\Entity\Parameter;
use ExpoActe\Acte\Label\LabelEnum;
use Twig\Extension\RuntimeExtensionInterface;

class ExpoActeExtensionRuntime implements RuntimeExtensionInterface
{
    public function groupName(string $value): string
    {
        return LabelEnum::getLabelByValue($value);
    }

    /**
     * @return  array<int, string>
     */
    public function parameterList(Parameter $parameter): array
    {
        if ($parameter->listval) {
            $list = explode(";", $parameter->listval);
            if ([] !== $list) {
                return $list;
            }
        }

        return [];
    }
}
