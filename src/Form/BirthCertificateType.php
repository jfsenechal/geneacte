<?php

namespace App\Form;

use App\Entity\ActParams;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirthCertificateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('groupe')
            ->add('ordre')
            ->add('type')
            ->add('valeur')
            ->add('listval')
            ->add('libelle')
            ->add('aide')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ActParams::class,
        ]);
    }
}
