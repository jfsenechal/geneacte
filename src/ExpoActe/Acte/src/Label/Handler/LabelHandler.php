<?php

namespace ExpoActe\Acte\Label\Handler;

use ExpoActe\Acte\Label\LabelDto;
use ExpoActe\Acte\Repository\MetaDbRepository;

class LabelHandler
{
    public function __construct(private readonly MetaDbRepository $metaDbRepository)
    {
    }

    public function treatmentEdit(LabelDto $labelDto)
    {
        foreach ($labelDto->metasLabel as $metaLabel) {
            $metaLabel->metaDb->affich = $metaLabel->labelDocumentEnum->value;
        }
        $this->metaDbRepository->flush();
    }
}