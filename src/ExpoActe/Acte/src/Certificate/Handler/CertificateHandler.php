<?php

namespace ExpoActe\Acte\Certificate\Handler;

use ExpoActe\Acte\Repository\MetaGroupLabelRepository;
use Symfony\Component\Form\Form;

class CertificateHandler
{
    public function __construct(
        private readonly MetaGroupLabelRepository $metaGroupLabelRepository
    ) {
    }

    public function groupFieldsForForm(Form $form, string $type): array
    {
        $labelGroups = $this->metaGroupLabelRepository->findByCertificateType($type);
        foreach ($labelGroups as $group) {
            foreach ($form->all() as $field) {
                if ($group->grp === $field->getConfig()->getOption('attr')['groupLabel']) {
                    $group->fields[] = $field->createView();
                }
            }
        }

        return $labelGroups;
    }
}
