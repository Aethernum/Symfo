<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeEvenementRepository")
 */
class TypeEvenement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $TypeEvenement;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $LibelleEvenement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Evenement", mappedBy="TypeEvenements")
     */
    private $Evenements;

    public function __construct()
    {
        $this->Evenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeEvenement(): ?int
    {
        return $this->TypeEvenement;
    }

    public function setTypeEvenement(int $TypeEvenement): self
    {
        $this->TypeEvenement = $TypeEvenement;

        return $this;
    }

    public function getLibelleEvenement(): ?string
    {
        return $this->LibelleEvenement;
    }

    public function setLibelleEvenement(string $LibelleEvenement): self
    {
        $this->LibelleEvenement = $LibelleEvenement;

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
            $evenement->setTypeEvenements($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->Evenements->contains($evenement)) {
            $this->Evenements->removeElement($evenement);
            // set the owning side to null (unless already changed)
            if ($evenement->getTypeEvenements() === $this) {
                $evenement->setTypeEvenements(null);
            }
        }

        return $this;
    }
}
