<?php

namespace ExpoActe\Acte\Entity;

use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ExpoActe\Acte\Entity\Traits\IdTrait;
use ExpoActe\Acte\Entity\Traits\UuidTrait;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Table(name: 'act_user3')]
#[ORM\Entity]
class User implements UserInterface
{
    use IdTrait, UuidTrait;

    #[ORM\Column(name: 'login', type: Types::STRING, length: 15, nullable: false)]
    public string $login = '';

    #[ORM\Column(name: 'hashpass', type: Types::STRING, length: 40, nullable: false)]
    public string $hashpass = '';

    #[ORM\Column(name: 'nom', type: Types::STRING, length: 140, nullable: true)]
    public ?string $nom = null;

    #[ORM\Column(name: 'prenom', type: Types::STRING, length: 140, nullable: true)]
    public ?string $prenom = null;

    #[ORM\Column(name: 'email', type: Types::STRING, length: 140, nullable: true)]
    public ?string $email = null;

    #[ORM\Column(name: 'level', type: Types::INTEGER, nullable: true, options: ['default' => '1'])]
    public int $level = 1;

    #[ORM\Column(name: 'regime', type: Types::INTEGER, nullable: true)]
    public int $regime = 0;

    #[ORM\Column(name: 'solde', type: Types::INTEGER, nullable: true)]
    public int $solde = 0;

    #[ORM\Column(name: 'maj_solde', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '1001-01-01'])]
    public DateTimeInterface|null $majSolde;

    #[ORM\Column(name: 'statut', type: Types::STRING, length: 1, nullable: false, options: ['default' => 'N'])]
    public string $statut = 'N';

    #[ORM\Column(name: 'dtcreation', type: Types::DATE_MUTABLE, nullable: true)]
    public ?DateTimeInterface $dtcreation = null;

    #[ORM\Column(name: 'dtexpiration', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '2033-12-31'])]
    public ?DateTimeInterface $dtexpiration;

    #[ORM\Column(name: 'pt_conso', type: Types::INTEGER, nullable: false)]
    public int $ptConso = 0;

    #[ORM\Column(name: 'REM', type: Types::STRING, length: 140, nullable: true)]
    public ?string $rem = null;

    #[ORM\Column(name: 'libre', type: Types::STRING, length: 100, nullable: true)]
    public ?string $libre = null;

    public ?string $plainPassword = null;

    public function __construct()
    {
    }

    public function __toString(): string
    {
        return $this->nom.' '.$this->prenom;
    }

    public function getRoles(): array
    {
        return [];
    }

    public function eraseCredentials(): void
    {

    }

    public function getUserIdentifier(): string
    {
        return $this->login;
    }
}
