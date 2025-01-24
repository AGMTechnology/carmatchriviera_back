<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: CarRepository::class)]
#[ApiResource]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $Prix = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $imagePaths = [];

    #[ORM\Column(length: 255)]
    private ?string $Argument = null;

    #[ORM\Column(length: 255)]
    private ?string $Place = null;

    #[ORM\Column(length: 255)]
    private ?string $Transmission = null;

    #[ORM\Column(length: 255)]
    private ?string $Carburant = null;

    #[ORM\Column(length: 255)]
    private ?string $Garantie = null;

    #[ORM\Column(length: 255)]
    private ?string $Kilo = null;

    #[ORM\Column(length: 255)]
    private ?string $Annee = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getArgument(): ?string
    {
        return $this->Argument;
    }

    public function setArgument(string $Argument): static
    {
        $this->Argument = $Argument;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->Place;
    }

    public function setPlace(string $Place): static
    {
        $this->Place = $Place;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->Transmission;
    }

    public function setTransmission(string $Transmission): static
    {
        $this->Transmission = $Transmission;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->Carburant;
    }

    public function setCarburant(string $Carburant): static
    {
        $this->Carburant = $Carburant;

        return $this;
    }

    public function getGarantie(): ?string
    {
        return $this->Garantie;
    }

    public function setGarantie(string $Garantie): static
    {
        $this->Garantie = $Garantie;

        return $this;
    }

    public function getKilo(): ?string
    {
        return $this->Kilo;
    }

    public function setKilo(string $Kilo): static
    {
        $this->Kilo = $Kilo;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->Annee;
    }

    public function setAnnee(string $Annee): static
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->title;
    }

    public function setName(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Prix;
    }

    public function setPrice(int $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getImagePaths(): array
    {
        return $this->imagePaths;
    }

    public function setImagePaths(array $imagePaths): static
    {
        $this->imagePaths = $imagePaths;

        return $this;
    }
    
}
