<?php

namespace ExpoActe\Acte\Parameter\Form;

use ExpoActe\Acte\Entity\Parameter;
use ExpoActe\Acte\Parameter\ParameterEnum;
use ExpoActe\Acte\Tools\StringUtil;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AddParameterFieldsSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            FormEvents::PRE_SET_DATA => 'preSetData',
        ];
    }

    public function preSetData(FormEvent $event): void
    {
        $form = $event->getForm();
        /** @var Parameter $parameter */
        $parameter = $event->getData();

        $type = TextType::class;
        $default = [
            'required' => false,
            'help' => $parameter->aide,
            'label' => $parameter->libelle,
        ];

        if ($parameter->type === ParameterEnum::TEXTAREA->value) {
            $type = TextareaType::class;
            // $default['size'] = ParameterEnum::getSize($parameter->type);
            $default['attr'] = [
                'rows' => 12,
            ];
        }
        if ($parameter->type === ParameterEnum::CHECKBOX->value) {
            $type = CheckboxType::class;
            $parameter->valeur = StringUtil::transformToBoolean($parameter->valeur);
            $default['data'] = StringUtil::transformToBoolean($parameter->valeur);
        }
        if ($parameter->type === ParameterEnum::NUMERIC->value) {
            $type = IntegerType::class;
        }
        if ($parameter->type === ParameterEnum::LIST->value) {
            $type = ChoiceType::class;
            $default['choices'] = array_flip(explode(';', $parameter->listval));
        }

        $form
            ->add(
                'valeur',
                $type,
                $default
            );
    }
}
