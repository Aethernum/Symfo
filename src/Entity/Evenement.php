<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 */
class Evenement
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
    private $NomEvenement;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\Column(type="time")
     */
    private $HeureDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $HeureFin;

    /**
     * @ORM\Column(type="integer")
     */
    private $NombrePlace;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $CategoriePlace;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="Evenement", orphanRemoval=true)
     */
    private $Billets;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Client", inversedBy="Evenements")
     */
    private $Clients;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeEvenement", inversedBy="Evenements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TypeEvenements;

    public function __construct()
    {
        $this->Billets = new ArrayCollection();
        $this->Clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvenement(): ?string
    {
        return $this->NomEvenement;
    }

    public function setNomEvenement(string $NomEvenement): self
    {
        $this->NomEvenement = $NomEvenement;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->HeureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $HeureDebut): self
    {
        $this->HeureDebut = $HeureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->HeureFin;
    }

    public function setHeureFin(\DateTimeInterface $HeureFin): self
    {
        $this->HeureFin = $HeureFin;

        return $this;
    }

    public function getNombrePlace(): ?int
    {
        return $this->NombrePlace;
    }

    public function setNombrePlace(int $NombrePlace): self
    {
        $this->NombrePlace = $NombrePlace;

        return $this;
    }

    public function getCategoriePlace(): ?string
    {
        return $this->CategoriePlace;
    }

    public function setCategoriePlace(string $CategoriePlace): self
    {
        $this->CategoriePlace = $CategoriePlace;

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
            $billet->setEvenement($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->Billets->contains($billet)) {
            $this->Billets->removeElement($billet);
            // set the owning side to null (unless already changed)
            if ($billet->getEvenement() === $this) {
                $billet->setEvenement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->Clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->Clients->contains($client)) {
            $this->Clients[] = $client;
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->Clients->contains($client)) {
            $this->Clients->removeElement($client);
        }

        return $this;
    }

    public function getTypeEvenements(): ?TypeEvenement
    {
        return $this->TypeEvenements;
    }

    public function setTypeEvenements(?TypeEvenement $TypeEvenements): self
    {
        $this->TypeEvenements = $TypeEvenements;

        return $this;
    }
}
