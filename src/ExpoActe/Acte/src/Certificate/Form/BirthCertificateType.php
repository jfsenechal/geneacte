<?php

namespace ExpoActe\Acte\Certificate\Form;

use ExpoActe\Acte\Entity\BirthCertificate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirthCertificateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sexe', TextType::class, [
                'label' => 'Sexe',
                'required' => false,
            ])
            ->add('t1Nom', TextType::class, [
                'label' => 'Nom du parrain',
                'required' => false,
            ])
            ->add('t1Pre', TextType::class, [
                'label' => 'Prénoms',
                'required' => false,
            ])
            ->add('t1Com', TextType::class, [
                'label' => 'Commentaire',
                'required' => false,
            ])
            ->add('t2Nom', TextType::class, [
                'label' => 'Nom de la marraine',
                'required' => false,
            ])
            ->add('t2Pre', TextType::class, [
                'label' => 'Prénoms',
                'required' => false,
            ])
            ->add('t2Com', TextType::class, [
                'label' => 'Commentaire',
                'required' => false,
            ]);
    }

    public function getParent()
    {
        return BaseCertificateType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BirthCertificate::class,
        ]);
    }
}
