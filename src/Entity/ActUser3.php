<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * ActUser3
 */
#[ORM\Table(name: 'act_user3')]
#[ORM\Entity]
class ActUser3 implements UserInterface
{
    #[ORM\Column(name: 'login', type: Types::STRING, length: 15, nullable: false)]
    public string $login = '';

    #[ORM\Column(name: 'hashpass', type: Types::STRING, length: 40, nullable: false)]
    public string $hashpass = '';

    #[ORM\Column(name: 'nom', type: Types::STRING, length: 30, nullable: true)]
    public ?string $nom = null;

    #[ORM\Column(name: 'prenom', type: Types::STRING, length: 30, nullable: true)]
    public ?string $prenom = null;

    #[ORM\Column(name: 'email', type: Types::STRING, length: 50, nullable: true)]
    public ?string $email = null;

    #[ORM\Column(name: 'level', type: Types::INTEGER, nullable: true, options: ['default' => '1'])]
    public int $level = 1;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'regime', type: Types::INTEGER, nullable: true)]
    public string $regime = '0';

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'solde', type: Types::INTEGER, nullable: true)]
    public string $solde = '0';

    /**
     * @var DateTimeInterface|null
     */
    #[ORM\Column(name: 'maj_solde', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '1001-01-01'])]
    public string $majSolde = '1001-01-01';

    #[ORM\Column(name: 'statut', type: Types::STRING, length: 1, nullable: false, options: ['default' => 'N'])]
    public string $statut = 'N';

    #[ORM\Column(name: 'dtcreation', type: Types::DATE_MUTABLE, nullable: true)]
    public ?DateTimeInterface $dtcreation = null;

    /**
     * @var DateTimeInterface|null
     */
    #[ORM\Column(name: 'dtexpiration', type: Types::DATE_MUTABLE, nullable: true, options: ['default' => '2033-12-31'])]
    public string $dtexpiration = '2033-12-31';

    #[ORM\Column(name: 'pt_conso', type: Types::INTEGER, nullable: false)]
    public string $ptConso = '0';

    #[ORM\Column(name: 'REM', type: Types::STRING, length: 50, nullable: true)]
    public ?string $rem = null;

    #[ORM\Column(name: 'libre', type: Types::STRING, length: 100, nullable: true)]
    public ?string $libre = null;

    #[ORM\Column(name: 'ID', type: Types::INTEGER, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    public int $id;


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
