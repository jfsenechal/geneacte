<?php

namespace ExpoActe\Acte\Certificate\Factory;

use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Certificate\CertificateInterface;
use ExpoActe\Acte\Certificate\Form\MarriageCertificateType;
use ExpoActe\Acte\Entity\MarriageCertificate;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class MarriageFactory implements CertificateFactoryInterface
{
    use RenderFormTrait;

    public function __construct(private readonly FormFactoryInterface $formFactory)
    {
    }

    public function newInstance(): MarriageCertificate
    {
        return new MarriageCertificate();
    }

    public function generateForm(CertificateInterface $data): FormInterface
    {
        return $this->formFactory->create(MarriageCertificateType::class, $data);
    }

    public static function getType(): string
    {
        return CertificateTypeEnum::MARRIAGE->value;
    }
}