<?php

namespace App\Entity;

use App\Repository\EFasciaorariaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EFasciaorariaRepository::class)]
class EFasciaoraria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdFascia_oraria = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $ora_inizio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFasciaOraria(): ?int
    {
        return $this->IdFascia_oraria;
    }

    public function setIdFasciaOraria(int $IdFascia_oraria): static
    {
        $this->IdFascia_oraria = $IdFascia_oraria;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getOraInizio(): ?\DateTimeInterface
    {
        return $this->ora_inizio;
    }

    public function setOraInizio(\DateTimeInterface $ora_inizio): static
    {
        $this->ora_inizio = $ora_inizio;

        return $this;
    }
}
