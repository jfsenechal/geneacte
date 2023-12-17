<?php

namespace App\Form;

use App\Entity\ActDec3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeathCertificateType extends AbstractType
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
            ->add('nom')
            ->add('pre')
            ->add('ori')
            ->add('dnais')
            ->add('sexe')
            ->add('age')
            ->add('com')
            ->add('pro')
            ->add('cNom')
            ->add('cPre')
            ->add('cCom')
            ->add('cPro')
            ->add('pNom')
            ->add('pPre')
            ->add('pCom')
            ->add('pPro')
            ->add('mNom')
            ->add('mPre')
            ->add('mCom')
            ->add('mPro')
            ->add('t1Nom')
            ->add('t1Pre')
            ->add('t1Com')
            ->add('t2Nom')
            ->add('t2Pre')
            ->add('t2Com')
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
            'data_class' => ActDec3::class,
        ]);
    }
}
