<?php

namespace ExpoActe\Acte\Certificate\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Witnesses1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('t1_com', TextType::class, [
                'label' => 't1Com',
                'required' => false,
            ])
            ->add('t2_nom', TextType::class, [
                'label' => 't2Nom',
                'required' => false,
            ])
            ->add('t2_pre', TextType::class, [
                'label' => 't2Pre',
                'required' => false,
            ])
            ->add('t2_com', TextType::class, [
                'label' => 't2Com',
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
