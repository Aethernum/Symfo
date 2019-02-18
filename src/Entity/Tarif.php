<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=100)
     */
    private $type_tarif;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle_tarif;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="Tarif")
     */
    private $Billets;

    public function __construct()
    {
        $this->Billets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeTarif(): ?string
    {
        return $this->type_tarif;
    }

    public function setTypeTarif(string $type_tarif): self
    {
        $this->type_tarif = $type_tarif;

        return $this;
    }

    public function getLibelleTarif(): ?string
    {
        return $this->libelle_tarif;
    }

    public function setLibelleTarif(string $libelle_tarif): self
    {
        $this->libelle_tarif = $libelle_tarif;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * @return Collection|Billet[]
     */
    public function getBillets(): Collection
    {
        return $this->Billets;
    }

    public function addBillet(Billet $billet): self
    {
        if (!$this->Billets->contains($billet)) {
            $this->Billets[] = $billet;
            $billet->setTarif($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->Billets->contains($billet)) {
            $this->Billets->removeElement($billet);
            // set the owning side to null (unless already changed)
            if ($billet->getTarif() === $this) {
                $billet->setTarif(null);
            }
        }

        return $this;
    }
}
