<?php

namespace App\Entity;

use App\Repository\EAppuntamentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EAppuntamentoRepository::class)]
class EAppuntamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdApp = null;

    #[ORM\Column(length: 5)]
    private ?string $stato = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdApp(): ?int
    {
        return $this->IdApp;
    }

    public function setIdApp(int $IdApp): static
    {
        $this->IdApp = $IdApp;

        return $this;
    }

    public function getStato(): ?string
    {
        return $this->stato;
    }

    public function setStato(string $stato): static
    {
        $this->stato = $stato;

        return $this;
    }
}
