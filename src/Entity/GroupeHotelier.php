<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\GroupeHotelierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=GroupeHotelierRepository::class)
 */
class GroupeHotelier
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity=Hotel::class, mappedBy="groupe_hotel")
     */
    private $hoteliers;

    public function __construct()
    {
        $this->hoteliers = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Hotel>
     */
    public function getHoteliers(): Collection
    {
        return $this->hoteliers;
    }

    public function addHotelier(Hotel $hotelier): self
    {
        if (!$this->hoteliers->contains($hotelier)) {
            $this->hoteliers[] = $hotelier;
            $hotelier->setGroupeHotel($this);
        }

        return $this;
    }

    public function removeHotelier(Hotel $hotelier): self
    {
        if ($this->hoteliers->removeElement($hotelier)) {

            if ($hotelier->getGroupeHotel() === $this) {
                $hotelier->setGroupeHotel(null);
            }
        }

        return $this;
    }




           public function __toString() {
               return $this->nom;
           }


}
