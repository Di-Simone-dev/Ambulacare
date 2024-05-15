<?php

namespace App\Entity;

use App\Repository\EMedicoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EMedicoRepository::class)]
class EMedico
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdMed = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $cognome = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 5)]
    private ?string $attivo = null;

    #[ORM\Column]
    private ?float $costo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMed(): ?int
    {
        return $this->IdMed;
    }

    public function setIdMed(int $IdMed): static
    {
        $this->IdMed = $IdMed;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): static
    {
        $this->cognome = $cognome;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getAttivo(): ?string
    {
        return $this->attivo;
    }

    public function setAttivo(string $attivo): static
    {
        $this->attivo = $attivo;

        return $this;
    }

    public function getCosto(): ?float
    {
        return $this->costo;
    }

    public function setCosto(float $costo): static
    {
        $this->costo = $costo;

        return $this;
    }
}
