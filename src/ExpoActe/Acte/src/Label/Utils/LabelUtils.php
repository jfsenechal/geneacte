<?php

namespace ExpoActe\Acte\Label\Utils;

use ExpoActe\Acte\Entity\Metadb;
use ExpoActe\Acte\Entity\MetaLabel;
use ExpoActe\Acte\Label\LabelDocumentEnum;
use ExpoActe\Acte\Label\LabelGroupEnum;
use JetBrains\PhpStorm\ArrayShape;

class LabelUtils
{
    public static function groupAll(
        #[ArrayShape([
            'group' => LabelGroupEnum::class,
            'metas' => [Metadb::class],
        ])]
        array $metas
    ): array {
        $data = [];
        foreach (LabelGroupEnum::cases() as $labelEnum) {
            foreach ($metas as $meta) {
                if ($meta->groupe == $labelEnum->value) {
                    $data[$labelEnum->value]['group'] = $labelEnum;
                    $data[$labelEnum->value]['metas'][] = $meta;
                }
            }
        }

        return $data;
    }

    /**
     * @param Metadb[] $metas
     * @return MetaLabel[]
     */
    public static function extractMetasLabel(array $metas): array
    {
        $metasLabel = [];
        foreach ($metas as $meta) {
            if (trim($meta->affich) == "") {
                $meta->affich = LabelDocumentEnum::NOT_EMPTY->value;
            }
            $metaLabel = $meta->metaLabel;
            $metaLabel->labelDocumentEnum = LabelDocumentEnum::from($meta->affich);
            $metaLabel->metaDb = $meta;
            $metasLabel[] = $metaLabel;
        }

        return $metasLabel;
    }

}