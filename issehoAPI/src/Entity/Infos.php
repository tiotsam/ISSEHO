<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Cours;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InfosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=InfosRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups' => ['read_cours','read_msgs']],
)]
class Infos
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
    #[Groups(['profs','read_user','read_cours','read_cour','read_msgs'])]
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['profs','read_user','read_cours','read_cour','read_msgs'])]
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read_user'])]
    private $departement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read_user'])]
    private $ville;

    /**
     * @ORM\Column(type="date")
     */
    #[Groups(['read_user'])]
    private $birthDate;

    /**
     * @ORM\Column(type="date")
     */
    #[Groups(['read_user'])]
    private $dateInscription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Groups(['profs','read_user','read_cours','read_cour','read_msgs'])]
    private $imageUser;

    /**
     * @ORM\OneToOne(targetEntity=user::class, mappedBy="infos")
     * @ORM\JoinColumn(nullable=false)
     */
    // #[Groups(['read_cour'])]
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="enfants")
     */
    // #[Groups(['read_cour'])]
    private $enfants;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read_user'])]
    private $rue;

    /**
     * @ORM\Column(type="string", length=14)
     */
    #[Groups(['read_user'])]
    private $tel;

    public function __construct()
    {
        $this->enfants = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDepartement(): ?int
    {
        return $this->departement;
    }

    public function setDepartement(int $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getImageUser(): ?string
    {
        return $this->imageUser;
    }

    public function setImageUser(?string $imageUser): self
    {
        $this->imageUser = $imageUser;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(user $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(User $enfant): self
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants[] = $enfant;
            $enfant->setEnfants($this);
        }

        return $this;
    }

    public function removeEnfant(User $enfant): self
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getEnfants() === $this) {
                $enfant->setEnfants(null);
            }
        }

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }


}
