<?php

namespace ExpoActe\Acte\Certificate\Form;

use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;

class CertificateSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', SearchType::class, [
                'label' => 'Nom',
                'help' => 'Recherche sur le nom, prénom, description',
                'attr' => [
                    'autocomplete' => 'off',
                ],
                'required' => false,
            ])
            ->add('type', EnumType::class, [
                'class' => CertificateTypeEnum::class,
                'label' => 'Type',
                'choice_label' => fn(CertificateTypeEnum $certificateTypeEnum) => $certificateTypeEnum->getLabel(),
                'required' => false,
            ]);
    }
}