<?php

namespace ExpoActe\Acte\Certificate\Factory;

use ExpoActe\Acte\Certificate\CertificateInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\Form\FormInterface;

#[AutoconfigureTag()]
interface CertificateFactoryInterface
{
    public static function getType(): string;

    public function newInstance(): CertificateInterface;

    public function generateForm(CertificateInterface $data): FormInterface;
}
