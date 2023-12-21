<?php

namespace ExpoActe\Acte\Certificate\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BaseCertificateType extends AbstractType
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
            ->add('com', TextType::class, [
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
            ])
        ;

    }
}