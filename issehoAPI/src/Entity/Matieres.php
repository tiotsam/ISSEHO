<?php

namespace App\Entity;

use App\Entity\Cours;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MatieresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MatieresRepository::class)
 */
#[ApiResource]
class Matieres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read_cours','read_cour'])]
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Groups(['read_cours','read_cour'])]
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=cours::class, mappedBy="matieres")
     */
    private $cours;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|cours[]
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setMatieres($this);
        }

        return $this;
    }

    public function removeCour(cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getMatieres() === $this) {
                $cour->setMatieres(null);
            }
        }

        return $this;
    }
}
