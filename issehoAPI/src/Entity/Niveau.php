<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Cours;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 */
#[ApiResource()]
class Niveau
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
     * @ORM\OneToMany(targetEntity=cours::class, mappedBy="niveau")
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
            $cour->setNiveau($this);
        }

        return $this;
    }

    public function removeCour(cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getNiveau() === $this) {
                $cour->setNiveau(null);
            }
        }

        return $this;
    }
}
