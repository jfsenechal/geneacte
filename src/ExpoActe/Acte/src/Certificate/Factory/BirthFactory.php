<?php

namespace ExpoActe\Acte\Certificate\Factory;

use ExpoActe\Acte\Certificate\CertificateEnum;
use ExpoActe\Acte\Certificate\CertificateInterface;
use ExpoActe\Acte\Certificate\Form\BirthCertificateType;
use ExpoActe\Acte\Entity\BirthCertificate;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class BirthFactory implements CertificateFactoryInterface
{
    use RenderFormTrait;

    public function __construct(private readonly FormFactoryInterface $formFactory)
    {
    }

    public function newInstance(): BirthCertificate
    {
        return new BirthCertificate();
    }

    public function generateForm(CertificateInterface $data): FormInterface
    {
        return $this->formFactory->create(BirthCertificateType::class, $data);
    }

    public static function getType(): string
    {
        return CertificateEnum::BIRTH->value;
    }
}