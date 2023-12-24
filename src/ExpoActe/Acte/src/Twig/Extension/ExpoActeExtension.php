<?php

namespace ExpoActe\Acte\Twig\Extension;

use ExpoActe\Acte\Twig\Runtime\ExpoActeExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class ExpoActeExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('label_group_name', [ExpoActeExtensionRuntime::class, 'groupName']),
            new TwigFilter('parameter_list', [ExpoActeExtensionRuntime::class, 'parameterList']),
        ];
    }
}
