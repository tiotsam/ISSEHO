<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
#[ApiResource]
class Cours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Auteur;

    /**
     * @ORM\ManyToMany(targetEntity=user::class)
     */
    private $participants;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=Matieres::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matieres;

    /**
     * @ORM\OneToMany(targetEntity=MailAuto::class, mappedBy="cours")
     */
    private $mailAutos;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
        $this->mailAutos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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

    /**
     * @return Collection|user[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(user $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
        }

        return $this;
    }

    public function removeParticipant(user $participant): self
    {
        $this->participants->removeElement($participant);

        return $this;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getMatieres(): ?Matieres
    {
        return $this->matieres;
    }

    public function setMatieres(?Matieres $matieres): self
    {
        $this->matieres = $matieres;

        return $this;
    }

    /**
     * @return Collection|MailAuto[]
     */
    public function getMailAutos(): Collection
    {
        return $this->mailAutos;
    }

    public function addMailAuto(MailAuto $mailAuto): self
    {
        if (!$this->mailAutos->contains($mailAuto)) {
            $this->mailAutos[] = $mailAuto;
            $mailAuto->setCours($this);
        }

        return $this;
    }

    public function removeMailAuto(MailAuto $mailAuto): self
    {
        if ($this->mailAutos->removeElement($mailAuto)) {
            // set the owning side to null (unless already changed)
            if ($mailAuto->getCours() === $this) {
                $mailAuto->setCours(null);
            }
        }

        return $this;
    }
}
