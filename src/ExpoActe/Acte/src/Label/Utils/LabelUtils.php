<?php

namespace ExpoActe\Acte\Label\Utils;

use ExpoActe\Acte\Entity\Metadb;
use ExpoActe\Acte\Label\LabelEnum;
use JetBrains\PhpStorm\ArrayShape;

class LabelUtils
{
    public static function groupAll(
        #[ArrayShape([
            'group' => LabelEnum::class,
            'metas' => [Metadb::class],
        ])]
        array $metas
    ): array {
        $data = [];
        foreach (LabelEnum::cases() as $labelEnum) {
            foreach ($metas as $meta) {
                if ($meta->groupe == $labelEnum->value) {
                    $data[$labelEnum->value]['group'] = $labelEnum;
                    $data[$labelEnum->value]['metas'][] = $meta;
                }
            }
        }

        return $data;
    }

}