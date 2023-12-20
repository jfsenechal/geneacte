<?php

namespace App\User\Form;

use App\Security\RoleEnum;
use App\User\ScoringSystemEnum;
use App\User\UserStatusEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;

class UserSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', SearchType::class, [
                'label' => 'Nom',
                'help' => 'Recherche sur le nom, prénom, email et login',
                'attr' => ['autocomplete' => 'off'],
                'required' => false,
            ])
            ->add('statut', EnumType::class, [
                'class' => UserStatusEnum::class,
                'label' => 'Statut',
                'choice_label' => fn(UserStatusEnum $userStatus) => $userStatus->getLabel(),
                'required' => false,
            ])
            ->add('scoring', EnumType::class, [
                'class' => ScoringSystemEnum::class,
                'label' => 'Régime point',
                'choice_label' => fn(ScoringSystemEnum $userStatus) => $userStatus->getLabel(),
                'required' => false,
            ])
            ->add('role', EnumType::class, [
                'class' => RoleEnum::class,
                'label' => 'Rôle',
                'choice_label' => fn(RoleEnum $userStatus) => $userStatus->getLabel(),
                'required' => false,
            ]);
    }
}
