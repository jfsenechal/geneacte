<?php

namespace ExpoActe\Acte\Label\Form;

use ExpoActe\Acte\Label\LabelDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LabelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('metasLabel', CollectionType::class, [
          //  'label' => false,
            'entry_type' => MetaLabelType::class,
            'entry_options' => [],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LabelDto::class,
        ]);
    }

}