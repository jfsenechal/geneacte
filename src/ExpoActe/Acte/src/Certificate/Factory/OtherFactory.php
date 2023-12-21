<?php

namespace ExpoActe\Acte\Certificate\Factory;

use ExpoActe\Acte\Certificate\CertificateEnum;
use ExpoActe\Acte\Certificate\Form\OtherCertificateType;
use ExpoActe\Acte\Entity\OtherCertificate;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;

class OtherFactory implements CertificateFactoryInterface
{
    public function __construct(
        private readonly FormFactoryInterface $formFactory,
        private readonly Environment $environment
    ) {
    }

    public function newInstance(): OtherCertificate
    {
        return new OtherCertificate();
    }

    public function generateForm(object $data): FormInterface
    {
        return $this->formFactory->create(OtherCertificateType::class, $data);
    }

    public function renderForm(FormInterface $form): string
    {
        return $this->environment->render('@ExpoActe/certificate/form/_other_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public static function getType(): string
    {
        return CertificateEnum::OTHER->value;
    }
}