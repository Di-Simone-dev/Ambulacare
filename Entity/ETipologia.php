<?php

namespace App\Entity;

use App\Repository\ETipologiaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ETipologiaRepository::class)]
class ETipologia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdTipologia = null;

    #[ORM\Column(length: 255)]
    private ?string $nome_tipologia = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTipologia(): ?int
    {
        return $this->IdTipologia;
    }

    public function setIdTipologia(int $IdTipologia): static
    {
        $this->IdTipologia = $IdTipologia;

        return $this;
    }

    public function getNomeTipologia(): ?string
    {
        return $this->nome_tipologia;
    }

    public function setNomeTipologia(string $nome_tipologia): static
    {
        $this->nome_tipologia = $nome_tipologia;

        return $this;
    }
}
