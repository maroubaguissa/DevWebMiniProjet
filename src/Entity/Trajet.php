<?php

namespace App\Entity;

use App\Repository\TrajetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="Trajet")
 * @ORM\HasLifecycleCallbacks() 
 * @ORM\Entity(repositoryClass=TrajetRepository::class)
 */
class Trajet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villedep;

    /**
     * @ORM\Column(type="date")
     */
    private $datedep;

    /**
     * @ORM\Column(type="time")
     */
    private $heuredep;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeA;

    /**
     * @ORM\Column(type="time")
     */
    private $heureA;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrePlace;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $distance;

    /**
     * @ORM\Column(type="date")
     */
    private $date_ajout;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="trajets")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="trajet")
     */
    private $booking;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="trajet")
     */
    private $avis;

    public function __construct()
    {
        $this->booking = new ArrayCollection();
        $this->avis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilledep(): ?string
    {
        return $this->villedep;
    }

    public function setVilledep(string $villedep): self
    {
        $this->villedep = $villedep;

        return $this;
    }

    public function getDatedep(): ?\DateTimeInterface
    {
        return $this->datedep;
    }

    public function setDatedep(\DateTimeInterface $datedep): self
    {
        $this->datedep = $datedep;

        return $this;
    }

    public function getHeuredep(): ?\DateTimeInterface
    {
        return $this->heuredep;
    }

    public function setHeuredep(\DateTimeInterface $heuredep): self
    {
        $this->heuredep = $heuredep;

        return $this;
    }

    public function getVilleA(): ?string
    {
        return $this->villeA;
    }

    public function setVilleA(string $villeA): self
    {
        $this->villeA = $villeA;

        return $this;
    }

    public function getHeureA(): ?\DateTimeInterface
    {
        return $this->heureA;
    }

    public function setHeureA(\DateTimeInterface $heureA): self
    {
        $this->heureA = $heureA;

        return $this;
    }

    public function getNbrePlace(): ?int
    {
        return $this->nbrePlace;
    }

    public function setNbrePlace(int $nbrePlace): self
    {
        $this->nbrePlace = $nbrePlace;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(int $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->date_ajout;
    }

    public function setDateAjout(\DateTimeInterface $date_ajout): self
    {
        $this->date_ajout = $date_ajout;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBooking(): Collection
    {
        return $this->booking;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->booking->contains($booking)) {
            $this->booking[] = $booking;
            $booking->setTrajet($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->booking->contains($booking)) {
            $this->booking->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getTrajet() === $this) {
                $booking->setTrajet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setTrajet($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->contains($avi)) {
            $this->avis->removeElement($avi);
            // set the owning side to null (unless already changed)
            if ($avi->getTrajet() === $this) {
                $avi->setTrajet(null);
            }
        }

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
       $this->date_ajout = new \DateTime();
    }
    /**
     * @ORM\PreUpdate()
    */
    public function preUpdate()
    {
      $this->date_ajout = new \DateTime();
    }
}
