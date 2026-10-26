<?php

namespace App\Entity;

use App\Repository\RemboursementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemboursementRepository::class)]
class Remboursement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $faitAt = null;

    #[ORM\ManyToOne(inversedBy: 'remboursements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pret $pret = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $updateAt = null;

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

    public function getFaitAt(): ?\DateTime
    {
        return $this->faitAt;
    }

    public function setFaitAt(\DateTime $faitAt): static
    {
        $this->faitAt = $faitAt;

        return $this;
    }

    public function getPret(): ?Pret
    {
        return $this->pret;
    }

    public function setPret(?Pret $pret): static
    {
        $this->pret = $pret;

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
