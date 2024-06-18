<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formation $idFormation = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Date $idDate = null;

    #[ORM\Column]
    private ?int $inscriptions = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFormation(): ?Formation
    {
        return $this->idFormation;
    }

    public function setIdFormation(?Formation $idFormation): static
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    public function getIdDate(): ?Date
    {
        return $this->idDate;
    }

    public function setIdDate(?Date $idDate): static
    {
        $this->idDate = $idDate;

        return $this;
    }

    public function getInscriptions(): ?int
    {
        return $this->inscriptions;
    }

    public function setInscriptions(int $inscriptions): static
    {
        $this->inscriptions = $inscriptions;

        return $this;
    }
}
