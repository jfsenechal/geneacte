<?php

namespace ExpoActe\Acte\Certificate\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Witnesses2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('t3_nom', TextType::class, [
                'label' => 't3Nom',
                'required' => false,
            ])
            ->add('t3_pre', TextType::class, [
                'label' => 't3Pre',
                'required' => false,
            ])
            ->add('t3_com', TextType::class, [
                'label' => 't3Com',
                'required' => false,
            ])
            ->add('t4_nom', TextType::class, [
                'label' => 't4Nom',
                'required' => false,
            ])
            ->add('t4_pre', TextType::class, [
                'label' => 't4Pre',
                'required' => false,
            ])
            ->add('t4_com', TextType::class, [
                'label' => 't4Com',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'inherit_data' => true,
        ]);
    }
}