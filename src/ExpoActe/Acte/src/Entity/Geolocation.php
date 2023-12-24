<?php

namespace ExpoActe\Acte\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ExpoActe\Acte\Geolocation\GeolocationEnum;

#[ORM\Table(name: 'act_geoloc')]
// #[ORM\UniqueConstraint(name: 'COMMUNE', columns: ['COMMUNE', 'DEPART'])]
#[ORM\Entity]
class Geolocation
{
    #[ORM\Column(name: 'ID', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;

    #[ORM\Column(name: 'COMMUNE', type: Types::STRING, length: 40, nullable: false)]
    public string $commune = '';

    #[ORM\Column(name: 'DEPART', type: Types::STRING, length: 40, nullable: false)]
    public string $depart = '';

    #[ORM\Column(name: 'LON', type: Types::FLOAT, precision: 10, scale: 0, nullable: true)]
    public ?float $lon = null;

    #[ORM\Column(name: 'LAT', type: Types::FLOAT, precision: 10, scale: 0, nullable: true)]
    public ?float $lat = null;

    #[ORM\Column(name: 'STATUT', type: Types::STRING, length: 1, nullable: false, enumType: GeolocationEnum::class, options: [
        'default' => 'N',
    ])]
    public GeolocationEnum $statut;

    #[ORM\Column(name: 'NOTE_N', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $note_n = null;

    #[ORM\Column(name: 'NOTE_M', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $note_m = null;

    #[ORM\Column(name: 'NOTE_D', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $note_d = null;

    #[ORM\Column(name: 'NOTE_V', type: Types::TEXT, length: 65535, nullable: true)]
    public ?string $note_v = null;

    public function __toString(): string
    {
        return $this->commune . ' [' . $this->depart . ']';
    }
}
