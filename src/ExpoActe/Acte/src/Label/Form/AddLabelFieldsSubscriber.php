<?php

namespace ExpoActe\Acte\Label\Form;

use ExpoActe\Acte\Label\LabelDto;
use ExpoActe\Acte\Repository\MetaDbRepository;
use ExpoActe\Acte\Repository\MetaLabelRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AddLabelFieldsSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly MetaLabelRepository $metaLabelRepository,
        private readonly MetaDbRepository $metaDbRepository
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            FormEvents::PRE_SET_DATA => 'preSetData',
        ];
    }

    public function preSetData(FormEvent $event): void
    {
        $form = $event->getForm();
        /** @var LabelDto $labelDto */
        $labelDto = $event->getData();

        $metas = $this->metaDbRepository->findByCertificateType($labelDto->certificateEnum->value);
        $metasLabel = [];
        foreach ($metas as $meta) {
            $metasLabel[] = $meta->metaLabel;
        }

        foreach ($metasLabel as $metaLabel) {
            $default = [
                'required' => true,
                'help' => $meta->metaLabel->aide,
                'label' => $meta->metaLabel->etiq,
                'attr' => [
                    'groupLabel' => $meta->groupe,
                ],
            ];

            $form
                ->add(
                    $metaLabel->zid,
                    MetaLabelType::class,
                    $default
                );
        }
    }
}
