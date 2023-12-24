<?php

namespace ExpoActe\Acte\Certificate\Factory;

use ExpoActe\Acte\Certificate\CertificateInterface;
use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Certificate\Form\DeathCertificateType;
use ExpoActe\Acte\Entity\DeathCertificate;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class DeathFactory implements CertificateFactoryInterface
{
    public function __construct(private readonly FormFactoryInterface $formFactory)
    {
    }

    public function newInstance(): DeathCertificate
    {
        return new DeathCertificate();
    }

    public function generateForm(CertificateInterface $data): FormInterface
    {
        return $this->formFactory->create(DeathCertificateType::class, $data);
    }

    public static function getType(): string
    {
        return CertificateTypeEnum::DEATH->value;
    }
}