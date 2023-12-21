<?php

namespace App\Parameter\Form;

use App\Entity\Param;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('groupe', TextType::class, [
                'label' => 'groupe',
                'required' => false,
            ])
            ->add('ordre', TextType::class, [
                'label' => 'ordre',
                'required' => false,
            ])
            ->add('type', TextType::class, [
                'label' => 'type',
                'required' => false,
            ])
            ->add('valeur', TextType::class, [
                'label' => 'valeur',
                'required' => false,
            ])
            ->add('listval', TextType::class, [
                'label' => 'listval',
                'required' => false,
            ])
            ->add('libelle', TextType::class, [
                'label' => 'libelle',
                'required' => false,
            ])
            ->add('aide', TextType::class, [
                'label' => 'aide',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Param::class,
        ]);
    }
}
