<?php

namespace App\Entity;

use App\Enum\StatutPret;
use App\Repository\PretRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PretRepository::class)]
class Pret
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $demandeAt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $remboursementPrevuAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $penalitePourcentage = null;

    #[ORM\Column(enumType: StatutPret::class)]
    private ?StatutPret $statut = null;

    #[ORM\Column]
    private ?int $interetsPourcentage = null;

    #[ORM\ManyToOne(inversedBy: 'prets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Membre $membre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDemandeAt(): ?\DateTime
    {
        return $this->demandeAt;
    }

    public function setDemandeAt(\DateTime $demandeAt): static
    {
        $this->demandeAt = $demandeAt;

        return $this;
    }

    public function getRemboursementPrevuAt(): ?\DateTime
    {
        return $this->remboursementPrevuAt;
    }

    public function setRemboursementPrevuAt(\DateTime $remboursementPrevuAt): static
    {
        $this->remboursementPrevuAt = $remboursementPrevuAt;

        return $this;
    }

    public function getPenalitePourcentage(): ?int
    {
        return $this->penalitePourcentage;
    }

    public function setPenalitePourcentage(?int $penalitePourcentage): static
    {
        $this->penalitePourcentage = $penalitePourcentage;

        return $this;
    }

    public function getStatut(): ?StatutPret
    {
        return $this->statut;
    }

    public function setStatut(StatutPret $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getInteretsPourcentage(): ?int
    {
        return $this->interetsPourcentage;
    }

    public function setInteretsPourcentage(int $interetsPourcentage): static
    {
        $this->interetsPourcentage = $interetsPourcentage;

        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): static
    {
        $this->membre = $membre;

        return $this;
    }
}
