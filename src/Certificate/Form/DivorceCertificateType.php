<?php

namespace App\Certificate\Form;

use App\Entity\ActDiv3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DivorceCertificateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bidon')
            ->add('codcom')
            ->add('commune')
            ->add('coddep')
            ->add('depart')
            ->add('typact')
            ->add('datetxt')
            ->add('drepub')
            ->add('cote')
            ->add('libre')
            ->add('sigle')
            ->add('libelle')
            ->add('nom')
            ->add('pre')
            ->add('sexe')
            ->add('ori')
            ->add('dnais')
            ->add('age')
            ->add('com')
            ->add('pro')
            ->add('excon')
            ->add('excPre')
            ->add('excCom')
            ->add('pNom')
            ->add('pPre')
            ->add('pCom')
            ->add('pPro')
            ->add('mNom')
            ->add('mPre')
            ->add('mCom')
            ->add('mPro')
            ->add('cNom')
            ->add('cPre')
            ->add('cSexe')
            ->add('cOri')
            ->add('cDnais')
            ->add('cAge')
            ->add('cCom')
            ->add('cPro')
            ->add('cExcon')
            ->add('cXPre')
            ->add('cXCom')
            ->add('cpNom')
            ->add('cpPre')
            ->add('cpCom')
            ->add('cpPro')
            ->add('cmNom')
            ->add('cmPre')
            ->add('cmCom')
            ->add('cmPro')
            ->add('t1Nom')
            ->add('t1Pre')
            ->add('t1Com')
            ->add('t2Nom')
            ->add('t2Pre')
            ->add('t2Com')
            ->add('t3Nom')
            ->add('t3Pre')
            ->add('t3Com')
            ->add('t4Nom')
            ->add('t4Pre')
            ->add('t4Com')
            ->add('comgen')
            ->add('idnim')
            ->add('photos')
            ->add('ladate')
            ->add('deposant')
            ->add('photogra')
            ->add('releveur')
            ->add('verifieu')
            ->add('dtdepot')
            ->add('dtmodif')
            ->add('uuid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ActDiv3::class,
        ]);
    }
}
