<?php

namespace App\Entity;

use App\Repository\SitesRepository;
use DateTime;
use Doctrine\DBAL\Types\DateImmutableType;
use Doctrine\ORM\Mapping as ORM;
use PHPStan\Type\Doctrine\Descriptors\DateImmutableType as DescriptorsDateImmutableType;

/**
 * @ORM\Entity(repositoryClass=SitesRepository::class)
 */
class Sites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\Column(type="text")
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $city;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTimeInterface $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $beforeImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $afterImage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getBeforeImage(): ?string
    {
        return $this->beforeImage;
    }

    public function setBeforeImage(string $beforeImage): self
    {
        $this->beforeImage = $beforeImage;

        return $this;
    }

    public function getAfterImage(): ?string
    {
        return $this->afterImage;
    }

    public function setAfterImage(string $afterImage): self
    {
        $this->afterImage = $afterImage;

        return $this;
    }
}
