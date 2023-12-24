<?php

namespace ExpoActe\Acte\Article\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', SearchType::class, [
                'label' => 'Nom',
                'attr' => [
                    'autocomplete' => 'off',
                ],
                'required' => false,
            ]);
    }
}
