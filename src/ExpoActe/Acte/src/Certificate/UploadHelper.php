<?php

namespace ExpoActe\Acte\Certificate;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

class UploadHelper
{
    public function __construct(
        #[Autowire('%kernel.project_dir%/data')]
        private $dataDir,
    ) {
    }
}