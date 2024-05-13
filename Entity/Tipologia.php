<?php

namespace App\Entity;

use App\Repository\TipologiaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipologiaRepository::class)]
class Tipologia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdTipologia = null;

    #[ORM\Column(length: 255)]
    private ?string $Nome_Tipologia = null;

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
        return $this->Nome_Tipologia;
    }

    public function setNomeTipologia(string $Nome_Tipologia): static
    {
        $this->Nome_Tipologia = $Nome_Tipologia;

        return $this;
    }
}
