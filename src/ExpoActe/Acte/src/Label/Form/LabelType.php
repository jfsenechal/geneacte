<?php

namespace ExpoActe\Acte\Label\Form;

use ExpoActe\Acte\Entity\Metadb;
use ExpoActe\Acte\Label\LabelDto;
use ExpoActe\Acte\Repository\MetaDbRepository;
use ExpoActe\Acte\Repository\MetaLabelRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LabelType extends AbstractType
{
    public function __construct(
        private readonly MetaLabelRepository $metaLabelRepository,
        private readonly MetaDbRepository $metaDbRepository
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addEventSubscriber(
            new AddLabelFieldsSubscriber($this->metaLabelRepository, $this->metaDbRepository)
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LabelDto::class,
        ]);
    }

}