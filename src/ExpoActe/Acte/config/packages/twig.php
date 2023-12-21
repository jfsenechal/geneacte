<?php

use Symfony\Config\TwigConfig;

return static function (TwigConfig $twig) {
    $twig
        ->global('expoacte_sitename', '%env(EXPOACTE_SITENAME)%')
        ->path('%kernel.project_dir%/src/ExpoActe/Acte/templates', 'ExpoActe')
//        ->path('%kernel.project_dir%/src/ExpoActe/Acte/templates/front', 'ExpoActeFront')
        ->formThemes(['bootstrap_5_layout.html.twig']);
};
