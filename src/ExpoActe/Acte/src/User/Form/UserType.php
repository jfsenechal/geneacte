<?php

namespace ExpoActe\Acte\User\Form;

use ExpoActe\Acte\Entity\User;
use ExpoActe\Acte\Security\RoleEnum;
use ExpoActe\Acte\User\ScoringSystemEnum;
use ExpoActe\Acte\User\UserStatusEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('login', TextType::class, [
                'label' => 'Nom d\'utilisateur',
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'required' => true,
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => true,
            ])
            ->add('level', EnumType::class, [
                'label' => 'Niveau d\'accès',
                'required' => true,
                'class' => RoleEnum::class,
                'choice_label' => fn (RoleEnum $userStatusEnum) => $userStatusEnum->getLabel(),
            ])
            ->add('regime', EnumType::class, [
                'label' => 'Régime points',
                'required' => true,
                'class' => ScoringSystemEnum::class,
                'choice_label' => fn (ScoringSystemEnum $userStatusEnum) => $userStatusEnum->getLabel(),
            ])
            ->add('solde', IntegerType::class, [
                'label' => 'Solde',
                'required' => true,
            ])
            ->add('maj_solde', DateType::class, [
                'label' => 'Mise à jour du solde',
                'required' => false,
            ])
            ->add('statut', EnumType::class, [
                'label' => 'Statut',
                'required' => true,
                'class' => UserStatusEnum::class,
                'choice_label' => fn (UserStatusEnum $userStatusEnum) => $userStatusEnum->getLabel(),
            ])
            ->add('dtexpiration', DateType::class, [
                'label' => 'Date d\'expiration',
                'required' => false,
            ])
            ->add('pt_conso', TextType::class, [
                'label' => 'Points consommés',
                'required' => true,
            ])
            ->add('rem', TextType::class, [
                'label' => 'Remarque',
                'required' => false,
            ])
            ->add('libre', TextType::class, [
                'label' => 'Libre',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
