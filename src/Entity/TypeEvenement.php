<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer")
     */
    private $id_TypeEvenement;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $TypeEvenement;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $LibelleEvenement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTypeEvenement(): ?int
    {
        return $this->id_TypeEvenement;
    }

    public function setIdTypeEvenement(int $id_TypeEvenement): self
    {
        $this->id_TypeEvenement = $id_TypeEvenement;

        return $this;
    }

    public function getTypeEvenement(): ?string
    {
        return $this->TypeEvenement;
    }

    public function setTypeEvenement(string $TypeEvenement): self
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
}
