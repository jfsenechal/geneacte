<?php

namespace ExpoActe\Acte\Certificate\Form;

use ExpoActe\Acte\Entity\OtherCertificate;
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
            ->add('exc_pre', TextType::class, [
                'label' => 'excPre',
                'required' => false,
            ])
            ->add('exc_com', TextType::class, [
                'label' => 'excCom',
                'required' => false,
            ])
            ->add('c_nom', TextType::class, [
                'label' => 'cNom',
                'required' => false,
            ])
            ->add('c_pre', TextType::class, [
                'label' => 'cPre',
                'required' => false,
            ])
            ->add('c_sexe', TextType::class, [
                'label' => 'cSexe',
                'required' => false,
            ])
            ->add('c_ori', TextType::class, [
                'label' => 'cOri',
                'required' => false,
            ])
            ->add('c_dnais', TextType::class, [
                'label' => 'cDnais',
                'required' => false,
            ])
            ->add('c_age', TextType::class, [
                'label' => 'cAge',
                'required' => false,
            ])
            ->add('c_com', TextType::class, [
                'label' => 'cCom',
                'required' => false,
            ])
            ->add('c_pro', TextType::class, [
                'label' => 'cPro',
                'required' => false,
            ])
            ->add('c_excon', TextType::class, [
                'label' => 'cExcon',
                'required' => false,
            ])
            ->add('c_x_pre', TextType::class, [
                'label' => 'cXPre',
                'required' => false,
            ])
            ->add('c_x_com', TextType::class, [
                'label' => 'cXCom',
                'required' => false,
            ])
            ->add('cp_nom', TextType::class, [
                'label' => 'cpNom',
                'required' => false,
            ])
            ->add('cp_pre', TextType::class, [
                'label' => 'cpPre',
                'required' => false,
            ])
            ->add('cp_com', TextType::class, [
                'label' => 'cpCom',
                'required' => false,
            ])
            ->add('cp_pro', TextType::class, [
                'label' => 'cpPro',
                'required' => false,
            ])
            ->add('cm_nom', TextType::class, [
                'label' => 'cmNom',
                'required' => false,
            ])
            ->add('cm_pre', TextType::class, [
                'label' => 'cmPre',
                'required' => false,
            ])
            ->add('cm_com', TextType::class, [
                'label' => 'cmCom',
                'required' => false,
            ])
            ->add('cm_pro', TextType::class, [
                'label' => 'cmPro',
                'required' => false,
            ])
            ->add('t1_com', TextType::class, [
                'label' => 't1Com',
                'required' => false,
            ])
            ->add('t2_nom', TextType::class, [
                'label' => 't2Nom',
                'required' => false,
            ])
            ->add('t2_pre', TextType::class, [
                'label' => 't2Pre',
                'required' => false,
            ])
            ->add('t2_com', TextType::class, [
                'label' => 't2Com',
                'required' => false,
            ])
            ->add('t3_nom', TextType::class, [
                'label' => 't3Nom',
                'required' => false,
            ])
            ->add('t3_pre', TextType::class, [
                'label' => 't3Pre',
                'required' => false,
            ])
            ->add('t3_com', TextType::class, [
                'label' => 't3Com',
                'required' => false,
            ])
            ->add('t4_nom', TextType::class, [
                'label' => 't4Nom',
                'required' => false,
            ])
            ->add('t4_pre', TextType::class, [
                'label' => 't4Pre',
                'required' => false,
            ])
            ->add('t4_com', TextType::class, [
                'label' => 't4Com',
                'required' => false,
            ])
            ->add('idnim', TextType::class, [
                'label' => 'idnim',
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
            'data_class' => OtherCertificate::class,
        ]);
    }
}
