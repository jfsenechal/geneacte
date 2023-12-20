<?php

namespace App\Certificate\Factory;

use App\Certificate\CertificateEnum;
use App\Entity\ActNai3;
use App\Form\BirthCertificateType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class BirthFactory implements CertificateFactoryInterface
{
    public function __construct(private readonly FormFactoryInterface $formFactory)
    {
    }

    public function newInstance(): ActNai3
    {
        return new ActNai3();
    }

    public function generateForm(object $data): FormInterface
    {
        return $this->formFactory->create(BirthCertificateType::class, $data);
    }

    public static function getType(): string
    {
        return CertificateEnum::BIRTH->value;
    }
}