<?php

namespace ExpoActe\Acte\Label\Form;

use ExpoActe\Acte\Entity\MetaGroupLabel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MetaGroupLabelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('getiq', TextType::class, [
            'label' => 'Etiquette',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MetaGroupLabel::class,
        ]);
    }

}