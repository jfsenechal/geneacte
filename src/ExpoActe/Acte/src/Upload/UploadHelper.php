<?php

namespace ExpoActe\Acte\Upload;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

class UploadHelper
{
    public function __construct(
        #[Autowire('%kernel.project_dir%/data')]
        private $dataDir,
    ) {
    }
}