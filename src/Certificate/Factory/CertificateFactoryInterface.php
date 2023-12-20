<?php

namespace App\Certificate\Factory;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\Form\FormInterface;

#[AutoconfigureTag()]
interface CertificateFactoryInterface
{
    public static function getType(): string;

    public function newInstance();

    public function generateForm(object $data): FormInterface;

    public function renderForm(FormInterface $form): string;
}