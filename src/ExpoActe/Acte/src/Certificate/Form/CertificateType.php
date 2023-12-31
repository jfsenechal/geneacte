<?php

namespace ExpoActe\Acte\Certificate\Form;

use ExpoActe\Acte\Certificate\CertificateInterface;
use ExpoActe\Acte\Repository\MetaDbRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CertificateType extends AbstractType
{
    public function __construct(
        private readonly MetaDbRepository $metaDbRepository
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addEventSubscriber(
            new AddCertificateFieldsSubscriber($this->metaDbRepository)
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CertificateInterface::class,
        ]);
    }
}
