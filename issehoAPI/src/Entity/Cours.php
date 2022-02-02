<?php

namespace App\Entity;

use App\Entity\User;
use ApiPlatform\Core\Annotation\ApiResource;
// use App\Controller\CoursController;
use App\Controller\Get4LastCoursController;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

// @ORM\Entity(repositoryClass=CoursRepository::class)

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoursRepository")
 */
#[ApiResource(
    normalizationContext: ['groups' => ['read_cours']],
    itemOperations: [
       'PUT','DELETE','PATCH',
       'get'=> [
           'normalization_context' => ['groups' => ['read_cour']],
       ],
       'getLastFour' => [
        'method' => 'GET',
        'path' => '/cours/home',
        'controller' => Get4LastCoursController::class,
        'pagination_enabled'=> false,
        'filters'=>[],
        'openapi_context'=>[
            'summary' => 'Récupère les quatre derniers cours.',
            'parameters' => [],
        ],
        ],

   ],
   )]
class Cours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read_cours'])]
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read_cours','read_cour'])]
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read_cours','read_cour'])]
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read_cours','read_cour'])]
    private $Auteur;

    /**
     * @ORM\ManyToMany(targetEntity=user::class)
     */
    #[Groups(['read_cours','read_cour'])]
    private $participants;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read_cours','read_cour'])]
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=Matieres::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read_cours','read_cour'])]
    private $matieres;

    /**
     * @ORM\OneToMany(targetEntity=MailAuto::class, mappedBy="cours")
     */
    private $mailAutos;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxParticipants;

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

    public function getMaxParticipants(): ?int
    {
        return $this->maxParticipants;
    }

    public function setMaxParticipants(int $maxParticipants): self
    {
        $this->maxParticipants = $maxParticipants;

        return $this;
    }
}
