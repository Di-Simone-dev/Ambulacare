<?php

namespace App\Entity;

use App\Repository\ERecensioneRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ERecensioneRepository::class)]
class ERecensione
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdRecensione = null;

    #[ORM\Column(length: 255)]
    private ?string $oggetto = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenuto = null;

    #[ORM\Column]
    private ?float $valutazione = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRecensione(): ?int
    {
        return $this->IdRecensione;
    }

    public function setIdRecensione(int $IdRecensione): static
    {
        $this->IdRecensione = $IdRecensione;

        return $this;
    }

    public function getOggetto(): ?string
    {
        return $this->oggetto;
    }

    public function setOggetto(string $oggetto): static
    {
        $this->oggetto = $oggetto;

        return $this;
    }

    public function getContenuto(): ?string
    {
        return $this->contenuto;
    }

    public function setContenuto(string $contenuto): static
    {
        $this->contenuto = $contenuto;

        return $this;
    }

    public function getValutazione(): ?float
    {
        return $this->valutazione;
    }

    public function setValutazione(float $valutazione): static
    {
        $this->valutazione = $valutazione;

        return $this;
    }
}
