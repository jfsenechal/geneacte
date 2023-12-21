<?php

namespace App\Certificate\Form;

use App\Entity\MarriageCertificate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarriageCertificateType extends AbstractType
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
            ->add('age', TextType::class, [
                'label' => 'Age',
                'required' => false,
            ])
            ->add('com', TextType::class, [
                'label' => 'Commentaire',
                'required' => false,
            ])
            ->add('pro', TextType::class, [
                'label' => 'Pro',
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
            ->add('pNom', TextType::class, [
                'label' => 'pNom',
                'required' => false,
            ])
            ->add('pPre', TextType::class, [
                'label' => 'pPre',
                'required' => false,
            ])
            ->add('pCom', TextType::class, [
                'label' => 'pCom',
                'required' => false,
            ])
            ->add('pPro', TextType::class, [
                'label' => 'pPro',
                'required' => false,
            ])
            ->add('mNom', TextType::class, [
                'label' => 'mNom',
                'required' => false,
            ])
            ->add('mPre', TextType::class, [
                'label' => 'mPre',
                'required' => false,
            ])
            ->add('mCom', TextType::class, [
                'label' => 'mCom',
                'required' => false,
            ])
            ->add('mPro', TextType::class, [
                'label' => 'mPro',
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
            'data_class' => MarriageCertificate::class,
        ]);
    }
}
