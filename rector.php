<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        //__DIR__.'/assets',
        //__DIR__.'/config',
        //__DIR__.'/public',
        __DIR__.'/src',
        //__DIR__.'/tests',
    ]);

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    $rectorConfig->importNames();

    // define sets of rules
    $rectorConfig->sets([
        //   DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
        //LevelSetList::UP_TO_PHP_82,
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SymfonySetList::SYMFONY_CODE_QUALITY,
        //DoctrineSetList::DOCTRINE_CODE_QUALITY,
        //DoctrineSetList::DOCTRINE_DBAL_40,
        //DoctrineSetList::DOCTRINE_ORM_29,
    ]);
};
