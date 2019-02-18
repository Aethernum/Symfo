<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $NomClient;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $PrenomClient;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Pseudo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $MdpClient;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $MailClient;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $TypeClient;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="Client", orphanRemoval=true)
     */
    private $Billets;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Evenement", mappedBy="Clients")
     */
    private $Evenements;

    public function __construct()
    {
        $this->Billets = new ArrayCollection();
        $this->Evenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->NomClient;
    }

    public function setNomClient(string $NomClient): self
    {
        $this->NomClient = $NomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->PrenomClient;
    }

    public function setPrenomClient(string $PrenomClient): self
    {
        $this->PrenomClient = $PrenomClient;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo): self
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    public function getMdpClient(): ?string
    {
        return $this->MdpClient;
    }

    public function setMdpClient(string $MdpClient): self
    {
        $this->MdpClient = $MdpClient;

        return $this;
    }

    public function getMailClient(): ?string
    {
        return $this->MailClient;
    }

    public function setMailClient(string $MailClient): self
    {
        $this->MailClient = $MailClient;

        return $this;
    }

    public function getTypeClient(): ?string
    {
        return $this->TypeClient;
    }

    public function setTypeClient(string $TypeClient): self
    {
        $this->TypeClient = $TypeClient;

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
            $billet->setClient($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->Billets->contains($billet)) {
            $this->Billets->removeElement($billet);
            // set the owning side to null (unless already changed)
            if ($billet->getClient() === $this) {
                $billet->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenements(): Collection
    {
        return $this->Evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->Evenements->contains($evenement)) {
            $this->Evenements[] = $evenement;
            $evenement->addClient($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->Evenements->contains($evenement)) {
            $this->Evenements->removeElement($evenement);
            $evenement->removeClient($this);
        }

        return $this;
    }
}
