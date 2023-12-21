<?php


namespace ExpoActe\Acte\Entity\Traits;

trait SlugTrait
{
    public function getSluggableFields(): array
    {
        return ['name'];
    }
}
