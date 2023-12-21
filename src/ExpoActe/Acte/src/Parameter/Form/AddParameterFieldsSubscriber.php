<?php

namespace ExpoActe\Acte\Parameter\Form;

use ExpoActe\Acte\Entity\Parameter;
use ExpoActe\Acte\Parameter\ParameterEnum;
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
    public function __construct()
    {
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
         * @var Parameter $parameter
         */
        $parameter = $event->getData();

        $type = TextType::class;
        $default = [
            'required' => false,
            'help' => $parameter->aide,
            'label' => $parameter->libelle,
        ];

        if ($parameter->type == ParameterEnum::TEXTAREA->value) {
            $type = TextareaType::class;
            //$default['size'] = ParameterEnum::getSize($parameter->type);
            $default['attr'] = ['rows' => 12];
        }
        if ($parameter->type == ParameterEnum::CHECKBOX->value) {
            $type = CheckboxType::class;
            $parameter->valeur = $this->transformToBoolean($parameter->valeur);
            $default['data'] = $this->transformToBoolean($parameter->valeur);
        }
        if ($parameter->type == ParameterEnum::NUMERIC->value) {
            $type = IntegerType::class;
        }
        if ($parameter->type == ParameterEnum::LIST->value) {
            $type = ChoiceType::class;
            $default['choices'] = array_flip(explode(";", $parameter->listval));
        }

        $form
            ->add(
                'valeur',
                $type,
                $default
            );
    }

    private function transformToBoolean(string|bool|null $valeur): ?bool
    {
        if (is_bool($valeur) || $valeur === null) {
            return $valeur;
        }

        if ($valeur == "1") {
            return true;
        }

        return false;
    }
}