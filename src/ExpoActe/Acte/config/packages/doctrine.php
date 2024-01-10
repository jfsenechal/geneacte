<?php

use ExpoActe\Acte\Doctrine\Extension\InstrFunction;
use ExpoActe\Acte\Doctrine\Extension\YearFunction;
use Symfony\Config\DoctrineConfig;

return static function (DoctrineConfig $doctrine) {
    $em = $doctrine->orm()->entityManager('default');
    $em->mapping('ExpoActe')
        ->isBundle(false)
        ->type('attribute')
        ->dir('%kernel.project_dir%/src/ExpoActe/Acte/src/Entity')
        ->prefix('ExpoActe\Acte')
        ->alias('ExpoActe');
    $dql = $em->dql();

    $dql->datetimeFunction('YEAR', YearFunction::class);
    $dql->stringFunction('INSTR', InstrFunction::class);
};
