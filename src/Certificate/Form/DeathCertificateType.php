<?php

namespace App\Certificate\Form;

use App\Entity\ActDec3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeathCertificateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ori', TextType::class, [
                'label' => 'Origine',
                'required' => false,
            ])
            ->add('dnais', TextType::class, [
                'label' => 'Date de naissance',
                'required' => false,
            ])
            ->add('sexe', TextType::class, [
                'label' => 'Sexe',
                'required' => false,
            ])
            ->add('age', TextType::class, [
                'label' => 'Age',
                'required' => false,
            ])
            ->add('pro', TextType::class, [
                'label' => 'Pro',
                'required' => false,
            ])
            ->add('t1Nom', TextType::class, [
                'label' => 'Nom témoin 1',
                'required' => false,
            ])
            ->add('t1Pre', TextType::class, [
                'label' => 'Prénom témoin 1',
                'required' => false,
            ])
            ->add('t1Com', TextType::class, [
                'label' => 'Commentaire témoin 1',
                'required' => false,
            ])
            ->add('t2Nom', TextType::class, [
                'label' => 'Nom témoin 2',
                'required' => false,
            ])
            ->add('t2Pre', TextType::class, [
                'label' => 'Prénom témoin 2',
                'required' => false,
            ])
            ->add('t2Com', TextType::class, [
                'label' => 'Commentaire témoin 2',
                'required' => false,
            ])
            ->add('idnim', TextType::class, [
                'label' => 'Idnim',
                'required' => false,
            ]);
    }

    public function getParent(): string
    {
        return BaseCertificateType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ActDec3::class,
        ]);
    }
}
