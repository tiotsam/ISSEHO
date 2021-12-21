<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MessageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
#[ApiResource]
class Message
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
    #[Groups(['read_user'])]
    private $objet;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read_user'])]
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read_user'])]
    private $dateEnvoi;

    /**
     * @ORM\ManyToMany(targetEntity=user::class, inversedBy="messages")
     */
    private $destinataire;

    /**
     * @ORM\ManyToOne(targetEntity=user::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Auteur;

    public function __construct()
    {
        $this->destinataire = new ArrayCollection();
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

    /**
     * @return Collection|user[]
     */
    public function getDestinataire(): Collection
    {
        return $this->destinataire;
    }

    public function addDestinataire(user $destinataire): self
    {
        if (!$this->destinataire->contains($destinataire)) {
            $this->destinataire[] = $destinataire;
        }

        return $this;
    }

    public function removeDestinataire(user $destinataire): self
    {
        $this->destinataire->removeElement($destinataire);

        return $this;
    }

    public function getAuteur(): ?user
    {
        return $this->Auteur;
    }

    public function setAuteur(?user $Auteur): self
    {
        $this->Auteur = $Auteur;

        return $this;
    }
}
