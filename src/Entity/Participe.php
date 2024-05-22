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


    #[ORM\ManyToOne(inversedBy: 'participes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Epreuve $epreuve = null;

    #[ORM\ManyToOne(inversedBy: 'participes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sportif $sportif = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getEpreuve(): ?Epreuve
    {
        return $this->epreuve;
    }

    public function setEpreuve(?Epreuve $epreuve): static
    {
        $this->epreuve = $epreuve;

        return $this;
    }

    public function getSportif(): ?Sportif
    {
        return $this->sportif;
    }

    public function setSportif(?Sportif $sportif): static
    {
        $this->sportif = $sportif;

        return $this;
    }
    
}
