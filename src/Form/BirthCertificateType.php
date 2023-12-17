<?php

namespace App\Form;

use App\Entity\ActNai3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirthCertificateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('codcom', TextType::class, [
                'label' => 'Code INSEE',
                'required' => false,
            ])
            ->add('commune', TextType::class, [
                'label' => 'Commune',
                'required' => false,
            ])
            ->add('coddep', TextType::class, [
                'label' => 'Code département',
                'required' => false,
            ])
            ->add('depart', TextType::class, [
                'label' => 'Département / Province',
                'required' => false,
            ])
            ->add('datetxt', TextType::class, [
                'label' => 'Date de l\'acte',
                'required' => false,
            ])
            ->add('drepub', TextType::class, [
                'label' => 'Date républicaine',
                'required' => false,
            ])
            ->add('cote', TextType::class, [
                'label' => 'Cote',
                'required' => false,
            ])
            ->add('libre', TextType::class, [
                'label' => 'Libre',
                'required' => false,
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'enfant',
                'required' => false,
            ])
            ->add('pre', TextType::class, [
                'label' => 'Prénoms',
                'required' => false,
            ])
            ->add('sexe', TextType::class, [
                'label' => 'Sexe',
                'required' => false,
            ])
            ->add('com', TextType::class, [
                'label' => 'Commentaire',
                'required' => false,
            ])
            ->add('pNom', TextType::class, [
                'label' => 'Nom du père',
                'required' => false,
            ])
            ->add('pPre', TextType::class, [
                'label' => 'Prénoms',
                'required' => false,
            ])
            ->add('pCom', TextType::class, [
                'label' => 'Commentaire',
                'required' => false,
            ])
            ->add('pPro', TextType::class, [
                'label' => 'Profession',
                'required' => false,
            ])
            ->add('mNom', TextType::class, [
                'label' => 'Nom de la mère',
                'required' => false,
            ])
            ->add('mPre', TextType::class, [
                'label' => 'Prénoms',
                'required' => false,
            ])
            ->add('mCom', TextType::class, [
                'label' => 'Commentaire',
                'required' => false,
            ])
            ->add('mPro', TextType::class, [
                'label' => 'Profession',
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
            ])
            ->add('comgen', TextareaType::class, [
                'label' => 'Commentaire général',
                'required' => false,
            ])
            ->add('photos', TextType::class, [
                'label' => 'Photos',
                'required' => false,
            ])
            ->add('deposant', TextType::class, [
                'label' => 'Déposant',
                'required' => false,
            ])
            ->add('photogra', TextareaType::class, [
                'label' => 'Photographe',
                'required' => false,
            ])
            ->add('releveur', TextType::class, [
                'label' => 'Transcripteur',
                'required' => false,
            ])
            ->add('verifieu', TextType::class, [
                'label' => 'Vérificateur',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ActNai3::class,
        ]);
    }
}
