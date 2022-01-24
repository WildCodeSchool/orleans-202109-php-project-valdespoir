<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use DateTimeImmutable;
use App\Repository\PartnerRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartnerRepository::class)
 * @Vich\Uploadable
 */
class Partner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * Assert\NotBlank
     * Assert\Length(max="255")
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * Assert\NotBlank
     */
    private ?string $picture = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * Assert\NotBlank
     * Assert\Length(max="255")
     * @Assert\Url
     */
    private ?string $link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }
}
