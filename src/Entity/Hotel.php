<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=HotelRepository::class)
 */
class Hotel
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
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre_etoile;



    /**
     * @ORM\ManyToOne(targetEntity=GroupeHotelier::class, inversedBy="hoteliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $groupe_hotel;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNombreEtoile(): ?string
    {
        return $this->nombre_etoile;
    }

    public function setNombreEtoile(?string $nombre_etoile): self
    {
        $this->nombre_etoile = $nombre_etoile;

        return $this;
    }

    public function getGroupeHotel(): ?GroupeHotelier
    {
        return $this->groupe_hotel;
    }

    public function setGroupeHotel(?GroupeHotelier $groupe_hotel): self
    {
        $this->groupe_hotel = $groupe_hotel;

        return $this;
    }
}
