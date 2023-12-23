<?php

namespace ExpoActe\Acte\Label\Utils;

use ExpoActe\Acte\Entity\Metadb;
use ExpoActe\Acte\Label\LabelEnum;

class LabelUtils
{
    /**
     * @return array{
     *     group: LabelEnum,
     *     metas: array<int,Metadb>
     * }
     */
    public static function groupAll(array $metas): array
    {
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