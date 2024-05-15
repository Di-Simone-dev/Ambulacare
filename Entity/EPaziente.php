<?php

namespace App\Entity;

use App\Repository\EPazienteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EPazienteRepository::class)]
class EPaziente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdPaz = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $cognome = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 16)]
    private ?string $codice_fiscale = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data_nascita = null;

    #[ORM\Column(length: 255)]
    private ?string $luogo_nascita = null;

    #[ORM\Column(length: 255)]
    private ?string $residenza = null;

    #[ORM\Column(length: 10)]
    private ?string $numero_telefono = null;

    #[ORM\Column(length: 5)]
    private ?string $attivo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPaz(): ?int
    {
        return $this->IdPaz;
    }

    public function setIdPaz(int $IdPaz): static
    {
        $this->IdPaz = $IdPaz;

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

    public function getCodiceFiscale(): ?string
    {
        return $this->codice_fiscale;
    }

    public function setCodiceFiscale(string $codice_fiscale): static
    {
        $this->codice_fiscale = $codice_fiscale;

        return $this;
    }

    public function getDataNascita(): ?\DateTimeInterface
    {
        return $this->data_nascita;
    }

    public function setDataNascita(\DateTimeInterface $data_nascita): static
    {
        $this->data_nascita = $data_nascita;

        return $this;
    }

    public function getLuogoNascita(): ?string
    {
        return $this->luogo_nascita;
    }

    public function setLuogoNascita(string $luogo_nascita): static
    {
        $this->luogo_nascita = $luogo_nascita;

        return $this;
    }

    public function getResidenza(): ?string
    {
        return $this->residenza;
    }

    public function setResidenza(string $residenza): static
    {
        $this->residenza = $residenza;

        return $this;
    }

    public function getNumeroTelefono(): ?string
    {
        return $this->numero_telefono;
    }

    public function setNumeroTelefono(string $numero_telefono): static
    {
        $this->numero_telefono = $numero_telefono;

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
}
