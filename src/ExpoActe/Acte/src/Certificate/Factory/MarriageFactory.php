<?php

namespace ExpoActe\Acte\Certificate\Factory;

use ExpoActe\Acte\Certificate\CertificateEnum;
use ExpoActe\Acte\Certificate\Form\MarriageCertificateType;
use ExpoActe\Acte\Entity\MarriageCertificate;
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

    public function newInstance(): MarriageCertificate
    {
        return new MarriageCertificate();
    }

    public function generateForm(object $data): FormInterface
    {
        return $this->formFactory->create(MarriageCertificateType::class, $data);
    }

    public function renderForm(FormInterface $form): string
    {
        return $this->environment->render('@ExpoActe/certificate/form/_marriage_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public static function getType(): string
    {
        return CertificateEnum::MARRIAGE->value;
    }
}