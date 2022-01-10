<?php

namespace App\Entity;

use App\Repository\PartenaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartenaireRepository::class)
 */
class Partenaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    //private $institutionalPartner;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
   // private $socialPartner;

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

   /* public function getInstitutionalPartner(): ?string
    {
        return $this->institutionalPartner;
    }

    public function setInstitutionalPartner(?string $institutionalPartner): self
    {
        $this->institutionalPartner = $institutionalPartner;

        return $this;
    }

    public function getSocialPartner(): ?string
    {
        return $this->socialPartner;
    }

    public function setSocialPartner(?string $socialPartner): self
    {
        $this->socialPartner = $socialPartner;

        return $this;
    }*/
}
