<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_book;

    /**
     * @ORM\Column(type="integer")
     */
    private $Place;

    /**
     * @ORM\ManyToOne(targetEntity=Trajet::class, inversedBy="booking")
     */
    private $trajet;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="booking")
     */
    private $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateBook(): ?\DateTimeInterface
    {
        return $this->date_book;
    }

    public function setDateBook(\DateTimeInterface $date_book): self
    {
        $this->date_book = $date_book;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->Place;
    }

    public function setPlace(int $Place): self
    {
        $this->Place = $Place;

        return $this;
    }

    public function getTrajet(): ?Trajet
    {
        return $this->trajet;
    }

    public function setTrajet(?Trajet $trajet): self
    {
        $this->trajet = $trajet;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }
}
