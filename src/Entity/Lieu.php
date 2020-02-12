<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LieuRepository")
 */
class Lieu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trajet", mappedBy="lieudepart")
     */
    private $departtrajets;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trajet", mappedBy="lieuarrivee")
     */
    private $arriveetrajets;

    public function __construct()
    {
        $this->departtrajets = new ArrayCollection();
        $this->arriveetrajets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getDeparttrajets(): Collection
    {
        return $this->departtrajets;
    }

    public function addDeparttrajet(Trajet $departtrajet): self
    {
        if (!$this->departtrajets->contains($departtrajet)) {
            $this->departtrajets[] = $departtrajet;
            $departtrajet->setLieudepart($this);
        }

        return $this;
    }

    public function removeDeparttrajet(Trajet $departtrajet): self
    {
        if ($this->departtrajets->contains($departtrajet)) {
            $this->departtrajets->removeElement($departtrajet);
            // set the owning side to null (unless already changed)
            if ($departtrajet->getLieudepart() === $this) {
                $departtrajet->setLieudepart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getArriveetrajets(): Collection
    {
        return $this->arriveetrajets;
    }

    public function addArriveetrajet(Trajet $arriveetrajet): self
    {
        if (!$this->arriveetrajets->contains($arriveetrajet)) {
            $this->arriveetrajets[] = $arriveetrajet;
            $arriveetrajet->setLieuarrivee($this);
        }

        return $this;
    }

    public function removeArriveetrajet(Trajet $arriveetrajet): self
    {
        if ($this->arriveetrajets->contains($arriveetrajet)) {
            $this->arriveetrajets->removeElement($arriveetrajet);
            // set the owning side to null (unless already changed)
            if ($arriveetrajet->getLieuarrivee() === $this) {
                $arriveetrajet->setLieuarrivee(null);
            }
        }

        return $this;
    }
}
