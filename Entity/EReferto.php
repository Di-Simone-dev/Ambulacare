<?php

namespace App\Entity;

use App\Repository\ERefertoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ERefertoRepository::class)]
class EReferto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdReferto = null;

    #[ORM\Column(length: 255)]
    private ?string $oggetto = null;

    #[ORM\Column(length: 255)]
    private ?string $contenuto = null;

    #[ORM\Column(type: Types::BLOB)]
    private $file = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdReferto(): ?int
    {
        return $this->IdReferto;
    }

    public function setIdReferto(int $IdReferto): static
    {
        $this->IdReferto = $IdReferto;

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

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file): static
    {
        $this->file = $file;

        return $this;
    }
}
