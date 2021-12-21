<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StatistiquesConnexionsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=StatistiquesConnexionsRepository::class)
 */
#[ApiResource]
class StatistiquesConnexions
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
    #[Groups(['read_user'])]
    private $dateConnexion;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read_user'])]
    private $dateDeconnexion;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="statistiquesConnexions")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateConnexion(): ?\DateTimeInterface
    {
        return $this->dateConnexion;
    }

    public function setDateConnexion(\DateTimeInterface $dateConnexion): self
    {
        $this->dateConnexion = $dateConnexion;

        return $this;
    }

    public function getDateDeconnexion(): ?\DateTimeInterface
    {
        return $this->dateDeconnexion;
    }

    public function setDateDeconnexion(\DateTimeInterface $dateDeconnexion): self
    {
        $this->dateDeconnexion = $dateDeconnexion;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }
}
