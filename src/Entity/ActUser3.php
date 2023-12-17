<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActUser3
 *
 * @ORM\Table(name="act_user3")
 * @ORM\Entity
 */
class ActUser3
{
    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=15, nullable=false)
     */
    private $login = '';

    /**
     * @var string
     *
     * @ORM\Column(name="hashpass", type="string", length=40, nullable=false)
     */
    private $hashpass = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var int|null
     *
     * @ORM\Column(name="level", type="integer", nullable=true, options={"default"="1"})
     */
    private $level = 1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="regime", type="integer", nullable=true)
     */
    private $regime = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="solde", type="integer", nullable=true)
     */
    private $solde = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="maj_solde", type="date", nullable=true, options={"default"="1001-01-01"})
     */
    private $majSolde = '1001-01-01';

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=1, nullable=false, options={"default"="N"})
     */
    private $statut = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dtcreation", type="date", nullable=true)
     */
    private $dtcreation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dtexpiration", type="date", nullable=true, options={"default"="2033-12-31"})
     */
    private $dtexpiration = '2033-12-31';

    /**
     * @var int
     *
     * @ORM\Column(name="pt_conso", type="integer", nullable=false)
     */
    private $ptConso = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REM", type="string", length=50, nullable=true)
     */
    private $rem;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libre", type="string", length=100, nullable=true)
     */
    private $libre;

    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}
