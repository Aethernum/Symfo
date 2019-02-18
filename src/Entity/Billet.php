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
    private $Code_Billet;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $TypeBillet;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $LibelleBillet;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumeroPlace;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeBillet(): ?string
    {
        return $this->Code_Billet;
    }

    public function setCodeBillet(string $Code_Billet): self
    {
        $this->Code_Billet = $Code_Billet;

        return $this;
    }

    public function getTypeBillet(): ?string
    {
        return $this->TypeBillet;
    }

    public function setTypeBillet(string $TypeBillet): self
    {
        $this->TypeBillet = $TypeBillet;

        return $this;
    }

    public function getLibelleBillet(): ?string
    {
        return $this->LibelleBillet;
    }

    public function setLibelleBillet(string $LibelleBillet): self
    {
        $this->LibelleBillet = $LibelleBillet;

        return $this;
    }

    public function getNumeroPlace(): ?int
    {
        return $this->NumeroPlace;
    }

    public function setNumeroPlace(int $NumeroPlace): self
    {
        $this->NumeroPlace = $NumeroPlace;

        return $this;
    }
}
