<?php

namespace App\Certificate\Factory;

use App\Certificate\CertificateEnum;
use App\Entity\ActMar3;
use App\Form\MarriageCertificateType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;

class MarriageFactory implements CertificateFactoryInterface
{
    public function __construct(
        private readonly FormFactoryInterface $formFactory,
        private readonly Environment $environment
    ) {
    }

    public function newInstance(): ActMar3
    {
        return new ActMar3();
    }

    public function generateForm(object $data): FormInterface
    {
        return $this->formFactory->create(MarriageCertificateType::class, $data);
    }

    public function renderForm(FormInterface $form): string
    {
        return $this->environment->render('@ExpoActe/certificate/form/_marriage_form.html.twig', [
            'form' => $form,
        ]);
    }

    public static function getType(): string
    {
        return CertificateEnum::MARRIAGE->value;
    }
}