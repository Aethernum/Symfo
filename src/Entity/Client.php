<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer")
     */
    private $Id_Client;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $NomClient;

    /**
     * @ORM\Column(type="string", length=40)
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?int
    {
        return $this->Id_Client;
    }

    public function setIdClient(int $Id_Client): self
    {
        $this->Id_Client = $Id_Client;

        return $this;
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
}
