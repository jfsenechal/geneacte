<?php


namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

trait UuidTrait
{
    #[ORM\Column(type: 'uuid', unique: false, nullable: true)]
    public ?string $uuid = null;

    public function generateUuid(): string
    {
        return Uuid::v4();
    }
}
