<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\QuestionnaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @ORM\OneToMany(targetEntity=user::class, mappedBy="questionnaire")
     */
    private $user;

    /**
     * @ORM\Column(type="array")
     */
    #[Groups(['read_user'])]
    private $questions = [];

    /**
     * @ORM\Column(type="array")
     */
    #[Groups(['read_user'])]
    private $reponses = [];

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuestions(): ?array
    {
        return $this->questions;
    }

    public function setQuestions(array $questions): self
    {
        $this->questions = $questions;

        return $this;
    }

    public function getReponses(): ?array
    {
        return $this->reponses;
    }

    public function setReponses(array $reponses): self
    {
        $this->reponses = $reponses;

        return $this;
    }
}
