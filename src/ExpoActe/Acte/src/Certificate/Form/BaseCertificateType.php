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
            ->add('p_nom', TextType::class, [
                'label' => 'Nom du père',
                'required' => false,
            ])
            ->add('p_pre', TextType::class, [
                'label' => 'Prénoms',
                'required' => false,
            ])
            ->add('p_com', TextType::class, [
                'label' => 'Commentaire',
                'required' => false,
            ])
            ->add('p_pro', TextType::class, [
                'label' => 'Profession',
                'required' => false,
            ])
            ->add('m_nom', TextType::class, [
                'label' => 'Nom de la mère',
                'required' => false,
            ])
            ->add('m_pre', TextType::class, [
                'label' => 'Prénoms',
                'required' => false,
            ])
            ->add('m_com', TextType::class, [
                'label' => 'Commentaire',
                'required' => false,
            ])
            ->add('m_pro', TextType::class, [
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
