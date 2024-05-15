<?php

namespace App\Entity;

use App\Repository\ERispostaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ERispostaRepository::class)]
class ERisposta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdRisposta = null;

    #[ORM\Column(length: 255)]
    private ?string $contenuto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRisposta(): ?int
    {
        return $this->IdRisposta;
    }

    public function setIdRisposta(int $IdRisposta): static
    {
        $this->IdRisposta = $IdRisposta;

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
}
