<?php

namespace ExpoActe\Acte\Twig\Components;

use ExpoActe\Acte\Entity\Summary;
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

    /**
     * @return array{commune:string, depart:string,id: int}
     */
    public function getMunicipalities(): array
    {
        if (null === $this->query) {
            return $this->actSumRepository->findMunicipalitiesByCertificateType($this->certificateType);
        }

        if (null !== $this->certificateType) {
            return $this->actSumRepository->findMunicipalitiesByCertificateTypeAndName($this->certificateType, $this->query);
        }

        return [];
    }
}
