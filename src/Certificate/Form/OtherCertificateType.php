<?php

namespace App\Certificate\Form;

use App\Entity\OtherCertificate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OtherCertificateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sigle', TextType::class, [
                'label' => 'sigle',
                'required' => false,
            ])
            ->add('libelle', TextType::class, [
                'label' => 'libelle',
                'required' => false,
            ])
            ->add('sexe', TextType::class, [
                'label' => 'sexe',
                'required' => false,
            ])
            ->add('ori', TextType::class, [
                'label' => 'ori',
                'required' => false,
            ])
            ->add('dnais', TextType::class, [
                'label' => 'dnais',
                'required' => false,
            ])
            ->add('age', TextType::class, [
                'label' => 'age',
                'required' => false,
            ])
            ->add('excon', TextType::class, [
                'label' => 'excon',
                'required' => false,
            ])
            ->add('excPre', TextType::class, [
                'label' => 'excPre',
                'required' => false,
            ])
            ->add('excCom', TextType::class, [
                'label' => 'excCom',
                'required' => false,
            ])
            ->add('cNom', TextType::class, [
                'label' => 'cNom',
                'required' => false,
            ])
            ->add('cPre', TextType::class, [
                'label' => 'cPre',
                'required' => false,
            ])
            ->add('cSexe', TextType::class, [
                'label' => 'cSexe',
                'required' => false,
            ])
            ->add('cOri', TextType::class, [
                'label' => 'cOri',
                'required' => false,
            ])
            ->add('cDnais', TextType::class, [
                'label' => 'cDnais',
                'required' => false,
            ])
            ->add('cAge', TextType::class, [
                'label' => 'cAge',
                'required' => false,
            ])
            ->add('cCom', TextType::class, [
                'label' => 'cCom',
                'required' => false,
            ])
            ->add('cPro', TextType::class, [
                'label' => 'cPro',
                'required' => false,
            ])
            ->add('cExcon', TextType::class, [
                'label' => 'cExcon',
                'required' => false,
            ])
            ->add('cXPre', TextType::class, [
                'label' => 'cXPre',
                'required' => false,
            ])
            ->add('cXCom', TextType::class, [
                'label' => 'cXCom',
                'required' => false,
            ])
            ->add('cpNom', TextType::class, [
                'label' => 'cpNom',
                'required' => false,
            ])
            ->add('cpPre', TextType::class, [
                'label' => 'cpPre',
                'required' => false,
            ])
            ->add('cpCom', TextType::class, [
                'label' => 'cpCom',
                'required' => false,
            ])
            ->add('cpPro', TextType::class, [
                'label' => 'cpPro',
                'required' => false,
            ])
            ->add('cmNom', TextType::class, [
                'label' => 'cmNom',
                'required' => false,
            ])
            ->add('cmPre', TextType::class, [
                'label' => 'cmPre',
                'required' => false,
            ])
            ->add('cmCom', TextType::class, [
                'label' => 'cmCom',
                'required' => false,
            ])
            ->add('cmPro', TextType::class, [
                'label' => 'cmPro',
                'required' => false,
            ])
            ->add('t1Nom', TextType::class, [
                'label' => 't1Nom',
                'required' => false,
            ])
            ->add('t1Pre', TextType::class, [
                'label' => 't1Pre',
                'required' => false,
            ])
            ->add('t1Com', TextType::class, [
                'label' => 't1Com',
                'required' => false,
            ])
            ->add('t2Nom', TextType::class, [
                'label' => 't2Nom',
                'required' => false,
            ])
            ->add('t2Pre', TextType::class, [
                'label' => 't2Pre',
                'required' => false,
            ])
            ->add('t2Com', TextType::class, [
                'label' => 't2Com',
                'required' => false,
            ])
            ->add('t3Nom', TextType::class, [
                'label' => 't3Nom',
                'required' => false,
            ])
            ->add('t3Pre', TextType::class, [
                'label' => 't3Pre',
                'required' => false,
            ])
            ->add('t3Com', TextType::class, [
                'label' => 't3Com',
                'required' => false,
            ])
            ->add('t4Nom', TextType::class, [
                'label' => 't4Nom',
                'required' => false,
            ])
            ->add('t4Pre', TextType::class, [
                'label' => 't4Pre',
                'required' => false,
            ])
            ->add('t4Com', TextType::class, [
                'label' => 't4Com',
                'required' => false,
            ])
            ->add('idnim', TextType::class, [
                'label' => 'idnim',
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
            'data_class' => OtherCertificate::class,
        ]);
    }
}
