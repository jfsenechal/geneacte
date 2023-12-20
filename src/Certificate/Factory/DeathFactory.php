<?php

namespace App\Certificate\Factory;

use App\Certificate\CertificateEnum;
use App\Entity\ActDec3;
use App\Form\DeathCertificateType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class DeathFactory implements CertificateFactoryInterface
{
    public function __construct(private readonly FormFactoryInterface $formFactory)
    {
    }

    public function newInstance(): ActDec3
    {
        return new ActDec3();
    }

    public function generateForm(object $data): FormInterface
    {
        return $this->formFactory->create(DeathCertificateType::class, $data);
    }

    public static function getType(): string
    {
        return CertificateEnum::DEATH->value;
    }
}