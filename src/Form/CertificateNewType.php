<?php

namespace App\Form;

use App\Certificate\CertificateEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CertificateNewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('municipality', MunicipalityAutocompleteField::class)
          /*  ->add('type', EnumType::class, [
                'class' => CertificateEnum::class,
                'label' => 'Type d\'acte',
                'choice_label' => fn(CertificateEnum $certificate): string => $certificate->getLabel(),
                'required' => true,
                'expanded' => true,
                'multiple' => false,
            ])*/;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([

        ]);
    }
}
