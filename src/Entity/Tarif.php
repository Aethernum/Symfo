<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifRepository")
 */
class Tarif
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_Tarif;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $TypeTarif;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $LibelleTarif;

    /**
     * @ORM\Column(type="float")
     */
    private $Montant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTarif(): ?int
    {
        return $this->id_Tarif;
    }

    public function setIdTarif(int $id_Tarif): self
    {
        $this->id_Tarif = $id_Tarif;

        return $this;
    }

    public function getTypeTarif(): ?string
    {
        return $this->TypeTarif;
    }

    public function setTypeTarif(string $TypeTarif): self
    {
        $this->TypeTarif = $TypeTarif;

        return $this;
    }

    public function getLibelleTarif(): ?string
    {
        return $this->LibelleTarif;
    }

    public function setLibelleTarif(string $LibelleTarif): self
    {
        $this->LibelleTarif = $LibelleTarif;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->Montant;
    }

    public function setMontant(float $Montant): self
    {
        $this->Montant = $Montant;

        return $this;
    }
}
