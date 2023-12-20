<?php

namespace App\Certificate\Factory;

use App\Certificate\CertificateEnum;
use App\Entity\ActNai3;
use App\Form\BirthCertificateType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;

class BirthFactory implements CertificateFactoryInterface
{
    public function __construct(
        private readonly FormFactoryInterface $formFactory,
        private readonly Environment $environment
    ) {
    }

    public function newInstance(): ActNai3
    {
        return new ActNai3();
    }

    public function generateForm(object $data): FormInterface
    {
        return $this->formFactory->create(BirthCertificateType::class, $data);
    }

    public function renderForm(FormInterface $form): string
    {
        return $this->environment->render('@ExpoActe/certificate/form/_birth_form.html.twig', [
            'form' => $form,
        ]);
    }

    public static function getType(): string
    {
        return CertificateEnum::BIRTH->value;
    }
}