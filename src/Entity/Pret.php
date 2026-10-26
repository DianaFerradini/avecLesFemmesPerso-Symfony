<?php

namespace App\Entity;

use App\Enum\StatutPret;
use App\Repository\PretRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Remboursement>
     */
    #[ORM\OneToMany(targetEntity: Remboursement::class, mappedBy: 'pret')]
    private Collection $remboursements;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $updateAt = null;

    public function __construct()
    {
        $this->remboursements = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Remboursement>
     */
    public function getRemboursements(): Collection
    {
        return $this->remboursements;
    }

    public function addRemboursement(Remboursement $remboursement): static
    {
        if (!$this->remboursements->contains($remboursement)) {
            $this->remboursements->add($remboursement);
            $remboursement->setPret($this);
        }

        return $this;
    }

    public function removeRemboursement(Remboursement $remboursement): static
    {
        if ($this->remboursements->removeElement($remboursement)) {
            // set the owning side to null (unless already changed)
            if ($remboursement->getPret() === $this) {
                $remboursement->setPret(null);
            }
        }

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTime
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTime $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }
}
