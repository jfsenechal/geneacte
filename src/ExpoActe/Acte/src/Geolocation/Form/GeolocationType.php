<?php

namespace ExpoActe\Acte\Geolocation\Form;

use ExpoActe\Acte\Entity\Geolocation;
use ExpoActe\Acte\Geolocation\GeolocationEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeolocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'commune',
                TextType::class,
                [
                    'label' => 'Commune',
                    'required' => true,
                    'attr' => [
                        'autocomplete' => 'off',
                    ],
                ]
            )
            ->add(
                'depart',
                TextType::class,
                [
                    'label' => 'Localité',
                    'attr' => [
                        'autocomplete' => 'off',
                    ],
                ]
            )
            ->add(
                'note_d',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Commentaire actes de décès',
                    'attr' => [
                        'autocomplete' => 'off',
                    ],
                ]
            )
            ->add(
                'note_m',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Commentaire actes de mariage',
                    'attr' => [
                        'autocomplete' => 'off',
                    ],
                ]
            )
            ->add(
                'note_n',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Commentaire actes de naissances',
                    'attr' => [
                        'autocomplete' => 'off',
                    ],
                ]
            )
            ->add(
                'note_v',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Commentaire actes divers',
                    'attr' => [
                        'autocomplete' => 'off',
                    ],
                ]
            )
            ->add(
                'lon',
                TextType::class,
                [
                    'label' => 'Longitude',
                    'attr' => [
                        'autocomplete' => 'off',
                    ],
                ]
            )
            ->add(
                'lat',
                TextType::class,
                [
                    'label' => 'Latitude',
                    'attr' => [
                        'autocomplete' => 'off',
                    ],
                ]
            )
            ->add(
                'statut',
                EnumType::class,
                [
                    'class' => GeolocationEnum::class,
                    'choice_label' => fn(GeolocationEnum $geolocationEnum): string => $geolocationEnum->getLabel(),
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Geolocation::class,
        ]);
    }
}
