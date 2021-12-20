<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MailAutoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

/**
 * @ORM\Entity(repositoryClass=MailAutoRepository::class)
 */
#[ApiResource]
class MailAuto
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
    private $objet;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEnvoi;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="mailAutos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auteur;

    /**
     * @ORM\ManyToMany(targetEntity=user::class)
     */
    private $destinataires;

    /**
     * @ORM\ManyToOne(targetEntity=cours::class, inversedBy="mailAutos")
     */
    private $cours;

    public function __construct()
    {
        $this->destinataires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    public function getAuteur(): ?user
    {
        return $this->auteur;
    }

    public function setAuteur(?user $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getDestinataires(): Collection
    {
        return $this->destinataires;
    }

    public function addDestinataire(user $destinataire): self
    {
        if (!$this->destinataires->contains($destinataire)) {
            $this->destinataires[] = $destinataire;
        }

        return $this;
    }

    public function removeDestinataire(user $destinataire): self
    {
        $this->destinataires->removeElement($destinataire);

        return $this;
    }

    public function getCours(): ?cours
    {
        return $this->cours;
    }

    public function setCours(?cours $cours): self
    {
        $this->cours = $cours;

        return $this;
    }
}
