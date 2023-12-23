<?php

namespace ExpoActe\Acte\Label\Form;

use ExpoActe\Acte\Entity\MetaLabel;
use ExpoActe\Acte\Label\LabelDocumentEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MetaLabelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('etiq', TextType::class)
            ->add('documentEnum', EnumType::class, [
                'class' => LabelDocumentEnum::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MetaLabel::class,
        ]);
    }
}