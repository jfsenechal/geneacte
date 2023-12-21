<?php

namespace App\Certificate\Factory;

use App\Certificate\CertificateEnum;
use App\Certificate\Form\DeathCertificateType;
use App\Entity\DeathCertificate;
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

    public function newInstance(): DeathCertificate
    {
        return new DeathCertificate();
    }

    public function generateForm(object $data): FormInterface
    {
        return $this->formFactory->create(DeathCertificateType::class, $data);
    }

    public function renderForm(FormInterface $form): string
    {
        return $this->environment->render('@ExpoActe/certificate/form/_death_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public static function getType(): string
    {
        return CertificateEnum::DEATH->value;
    }
}