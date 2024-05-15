<?php

namespace App\Entity;

use App\Repository\ECalendarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ECalendarioRepository::class)]
class ECalendario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdCalendario = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCalendario(): ?int
    {
        return $this->IdCalendario;
    }

    public function setIdCalendario(int $IdCalendario): static
    {
        $this->IdCalendario = $IdCalendario;

        return $this;
    }
}
