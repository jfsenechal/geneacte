<?php

namespace ExpoActe\Acte\Certificate\Form;

use ExpoActe\Acte\Certificate\TypeFieldEnum;
use ExpoActe\Acte\Entity\BirthCertificate;
use ExpoActe\Acte\Repository\MetaDbRepository;
use ExpoActe\Acte\Repository\MetaLabelRepository;
use ExpoActe\Acte\Tools\StringUtil;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\Length;

class AddCertificateFieldsSubscriber implements EventSubscriberInterface
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

    /**
     * @param FormEvent $event
     * @return void
     */
    public function preSetData(FormEvent $event): void
    {
        $form = $event->getForm();
        /**
         * @var BirthCertificate $certificate
         */
        $certificate = $event->getData();

        $metas = $this->metaDbRepository->findByCertificateType($certificate->typact);

        foreach ($metas as $meta) {
            $constraints = [];
            $default = [
                'required' => StringUtil::transformToBoolean($meta->oblig),
                'help' => $meta->metaLabel->aide,
                'label' => $meta->metaLabel->etiq,
                'attr' => ['groupLabel' => $meta->groupe],
            ];
            if ($meta->taille > 0) {
                $constraints[] = new Length(min: $meta->taille);
            }
            $type = TextType::class;

            if ($meta->bloc == '1') {
                $type = TextareaType::class;
                $default['attr']['rows'] = 6;
            }

            if ($meta->type == TypeFieldEnum::DAT->value) {
                $type = DateType::class;
            }

            if ($meta->type == TypeFieldEnum::SEX->value) {

            }

            $default['constraints'] = $constraints;
            $form
                ->add(
                    strtolower($meta->zone),
                    $type,
                    $default
                );
        }
    }

}