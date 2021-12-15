<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\QuestionnaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionnaireRepository::class)
 */
#[ApiResource]
class Questionnaire
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
    private $question;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reponse;

    /**
     * @ORM\OneToMany(targetEntity=user::class, mappedBy="questionnaire")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(?string $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(user $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setQuestionnaire($this);
        }

        return $this;
    }

    public function removeUser(user $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getQuestionnaire() === $this) {
                $user->setQuestionnaire(null);
            }
        }

        return $this;
    }
}
