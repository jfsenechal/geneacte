<?php

namespace ExpoActe\Acte\User\Form;

use ExpoActe\Acte\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('login')
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('level')
            ->add('regime')
            ->add('solde')
            ->add('majSolde')
            ->add('statut')
            ->add('dtexpiration')
            ->add('ptConso')
            ->add('rem')
            ->add('libre')        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
