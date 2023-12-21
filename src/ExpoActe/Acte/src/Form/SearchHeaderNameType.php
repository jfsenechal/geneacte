<?php

namespace ExpoActe\Acte\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchHeaderNameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                SearchType::class,
                [
                    'required' => true,
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Rechercher...',
                        'autocomplete' => 'off',
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
