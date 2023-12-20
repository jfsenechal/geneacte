<?php

namespace App\Certificate\Factory;

use App\Certificate\CertificateEnum;
use App\Entity\ActDec3;
use App\Form\DeathCertificateType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;

class DeathFactory implements CertificateFactoryInterface
{
    public function __construct(
        private readonly FormFactoryInterface $formFactory,
        private readonly Environment $environment
    ) {
    }

    public function newInstance(): ActDec3
    {
        return new ActDec3();
    }

    public function generateForm(object $data): FormInterface
    {
        return $this->formFactory->create(DeathCertificateType::class, $data);
    }

    public function renderForm(FormInterface $form): string
    {
        return $this->environment->render('@ExpoActe/certificate/form/_death_form.html.twig', [
            'form' => $form,
        ]);
    }

    public static function getType(): string
    {
        return CertificateEnum::DEATH->value;
    }
}