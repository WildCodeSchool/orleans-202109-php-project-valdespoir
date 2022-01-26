<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PartnerRepository::class)
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

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="partners")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Category $category;

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
