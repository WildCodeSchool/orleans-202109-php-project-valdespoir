<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 * @UniqueEntity("title")
 */
class Site
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(max="255")
     */
    private string $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(max="255")
     */
    private string $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Valid()
     */
    private string $beforePicture;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Valid()
     */
    private string $afterPicture;

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

    public function getBeforePicture(): ?string
    {
        return $this->beforePicture;
    }

    public function setBeforePicture(string $beforePicture): self
    {
        $this->beforePicture = $beforePicture;

        return $this;
    }

    public function getAfterPicture(): ?string
    {
        return $this->afterPicture;
    }

    public function setAfterPicture(string $afterPicture): self
    {
        $this->afterPicture = $afterPicture;

        return $this;
    }
}
