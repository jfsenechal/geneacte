<?php
use Symfony\Config\DoctrineConfig;

return static function (DoctrineConfig $doctrine) {
    $emMda = $doctrine->orm()->entityManager('default');
    $emMda->mapping('ExpoActe')
        ->isBundle(false)
        ->type('attribute')
        ->dir('%kernel.project_dir%/src/ExpoActe/Acte/src/Entity')
        ->prefix('ExpoActe\Acte')
        ->alias('ExpoActe');
};
