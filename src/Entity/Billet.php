<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BilletRepository")
 */
class Billet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $code_billet;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type_billet;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $libelle_billet;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numero_Place;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="Billets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tarif", inversedBy="Billets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Tarif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evenement", inversedBy="Billets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Evenement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeBillet(): ?string
    {
        return $this->code_billet;
    }

    public function setCodeBillet(string $code_billet): self
    {
        $this->code_billet = $code_billet;

        return $this;
    }

    public function getTypeBillet(): ?string
    {
        return $this->type_billet;
    }

    public function setTypeBillet(string $type_billet): self
    {
        $this->type_billet = $type_billet;

        return $this;
    }

    public function getLibelleBillet(): ?string
    {
        return $this->libelle_billet;
    }

    public function setLibelleBillet(string $libelle_billet): self
    {
        $this->libelle_billet = $libelle_billet;

        return $this;
    }

    public function getNumeroPlace(): ?int
    {
        return $this->Numero_Place;
    }

    public function setNumeroPlace(int $Numero_Place): self
    {
        $this->Numero_Place = $Numero_Place;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): self
    {
        $this->Client = $Client;

        return $this;
    }

    public function getTarif(): ?Tarif
    {
        return $this->Tarif;
    }

    public function setTarif(?Tarif $Tarif): self
    {
        $this->Tarif = $Tarif;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->Evenement;
    }

    public function setEvenement(?Evenement $Evenement): self
    {
        $this->Evenement = $Evenement;

        return $this;
    }
}
