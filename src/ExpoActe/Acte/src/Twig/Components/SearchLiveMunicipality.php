<?php

namespace ExpoActe\Acte\Twig\Components;

use ExpoActe\Acte\Repository\SummaryRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(template: '@ExpoActe/components/SearchLiveMunicipality.html.twig')]
class SearchLiveMunicipality
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $query = null;

    #[LiveProp(writable: true)]
    public ?string $certificateType = null;

    public function __construct(
        private readonly SummaryRepository $actSumRepository
    ) {
    }

    public function getMunicipalities(): array
    {
        if (null !== $this->query && null !== $this->certificateType) {
            return $this->actSumRepository->findMunicipalitiesByTableAndName($this->certificateType, $this->query);
        }
        if (null !== $this->certificateType) {
            return $this->actSumRepository->findMunicipalitiesByTable($this->certificateType);
        }

        return [];
    }
}
