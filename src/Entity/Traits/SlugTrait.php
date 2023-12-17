<?php


namespace App\Entity\Traits;

trait SlugTrait
{
    public function getSluggableFields(): array
    {
        return ['name'];
    }
}
