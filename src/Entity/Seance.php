<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeanceRepository::class)]
class Seance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $tenueAt = null;

    #[ORM\ManyToOne(inversedBy: 'seances')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tontine $tontine = null;

    #[ORM\ManyToOne(inversedBy: 'seancesBeneficiaire')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Membre $membreBeneficiaire = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $updateAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTenueAt(): ?\DateTime
    {
        return $this->tenueAt;
    }

    public function setTenueAt(\DateTime $tenueAt): static
    {
        $this->tenueAt = $tenueAt;

        return $this;
    }

    public function getTontine(): ?Tontine
    {
        return $this->tontine;
    }

    public function setTontine(?Tontine $tontine): static
    {
        $this->tontine = $tontine;

        return $this;
    }

    public function getMembreBeneficiaire(): ?Membre
    {
        return $this->membreBeneficiaire;
    }

    public function setMembreBeneficiaire(?Membre $membreBeneficiaire): static
    {
        $this->membreBeneficiaire = $membreBeneficiaire;

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
