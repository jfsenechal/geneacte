<?php

namespace ExpoActe\Acte\Certificate\Factory;

use ExpoActe\Acte\Certificate\CertificateEnum;
use ExpoActe\Acte\Certificate\CertificateInterface;
use ExpoActe\Acte\Certificate\Form\OtherCertificateType;
use ExpoActe\Acte\Entity\OtherCertificate;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class OtherFactory implements CertificateFactoryInterface
{
    use RenderFormTrait;

    public function __construct(private readonly FormFactoryInterface $formFactory)
    {
    }

    public function newInstance(): OtherCertificate
    {
        return new OtherCertificate();
    }

    public function generateForm(CertificateInterface $data): FormInterface
    {
        return $this->formFactory->create(OtherCertificateType::class, $data);
    }

    public static function getType(): string
    {
        return CertificateEnum::OTHER->value;
    }
}