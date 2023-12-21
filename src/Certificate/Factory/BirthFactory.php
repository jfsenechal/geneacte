<?php

namespace App\Certificate\Factory;

use App\Certificate\CertificateEnum;
use App\Certificate\Form\BirthCertificateType;
use App\Entity\BirthCertificate;
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

    public function newInstance(): BirthCertificate
    {
        return new BirthCertificate();
    }

    public function generateForm(object $data): FormInterface
    {
        return $this->formFactory->create(BirthCertificateType::class, $data);
    }

    public function renderForm(FormInterface $form): string
    {
        return $this->environment->render('@ExpoActe/certificate/form/_birth_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public static function getType(): string
    {
        return CertificateEnum::BIRTH->value;
    }
}