<?php

namespace App\Entity;

use App\Repository\ParticipeRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Sportif;
use App\Entity\Epreuve;

#[ORM\Entity(repositoryClass: ParticipeRepository::class)]
class Participe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Sportif::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sportif $sportif = null;

    #[ORM\ManyToOne(targetEntity: Epreuve::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Epreuve $epreuve = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSportif(): ?Sportif
    {
        return $this->sportif;
    }

    public function setSportif(Sportif $sportif): static
    {
        $this->sportif = $sportif;

        return $this;
    }

    public function getEpreuve(): ?Epreuve
    {
        return $this->epreuve;
    }

    public function setEpreuve(Epreuve $epreuve): static
    {
        $this->epreuve = $epreuve;

        return $this;
    }
    
}
