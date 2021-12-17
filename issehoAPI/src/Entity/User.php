<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
#[ApiResource()]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity=Infos::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $infos;

    /**
     * @ORM\ManyToOne(targetEntity=Questionnaire::class, inversedBy="user")
     */
    private $questionnaire;

    /**
     * @ORM\OneToMany(targetEntity=StatistiquesConnexions::class, mappedBy="user")
     */
    private $statistiquesConnexions;

    /**
     * @ORM\ManyToMany(targetEntity=Message::class, mappedBy="destinataire")
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="Auteur", orphanRemoval=true)
     */
    private $cours;

    /**
     * @ORM\OneToMany(targetEntity=MailAuto::class, mappedBy="auteur", orphanRemoval=true)
     */
    private $mailAutos;

    /**
     * @ORM\ManyToOne(targetEntity=Infos::class, inversedBy="enfants")
     */
    private $enfants;


  

    public function __construct()
    {
        $this->statistiquesConnexions = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->cours = new ArrayCollection();
        $this->mailAutos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getInfos(): ?Infos
    {
        return $this->infos;
    }

    public function setInfos(Infos $infos): self
    {
        // set the owning side of the relation if necessary
        if ($infos->getUser() !== $this) {
            $infos->setUser($this);
        }

        $this->infos = $infos;

        return $this;
    }

    public function getQuestionnaire(): ?Questionnaire
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(?Questionnaire $questionnaire): self
    {
        $this->questionnaire = $questionnaire;

        return $this;
    }

    /**
     * @return Collection|StatistiquesConnexions[]
     */
    public function getStatistiquesConnexions(): Collection
    {
        return $this->statistiquesConnexions;
    }

    public function addStatistiquesConnexion(StatistiquesConnexions $statistiquesConnexion): self
    {
        if (!$this->statistiquesConnexions->contains($statistiquesConnexion)) {
            $this->statistiquesConnexions[] = $statistiquesConnexion;
            $statistiquesConnexion->setUser($this);
        }

        return $this;
    }

    public function removeStatistiquesConnexion(StatistiquesConnexions $statistiquesConnexion): self
    {
        if ($this->statistiquesConnexions->removeElement($statistiquesConnexion)) {
            // set the owning side to null (unless already changed)
            if ($statistiquesConnexion->getUser() === $this) {
                $statistiquesConnexion->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->addDestinataire($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            $message->removeDestinataire($this);
        }

        return $this;
    }

    /**
     * @return Collection|Cours[]
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setAuteur($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getAuteur() === $this) {
                $cour->setAuteur(null);
            }
        }

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
            $mailAuto->setAuteur($this);
        }

        return $this;
    }

    public function removeMailAuto(MailAuto $mailAuto): self
    {
        if ($this->mailAutos->removeElement($mailAuto)) {
            // set the owning side to null (unless already changed)
            if ($mailAuto->getAuteur() === $this) {
                $mailAuto->setAuteur(null);
            }
        }

        return $this;
    }

    public function getEnfants(): ?Infos
    {
        return $this->enfants;
    }

    public function setEnfants(?Infos $enfants): self
    {
        $this->enfants = $enfants;

        return $this;
    }


}
