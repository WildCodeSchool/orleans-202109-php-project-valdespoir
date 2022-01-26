<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use DateTimeImmutable;
use App\Repository\PartnerRepository;
use phpDocumentor\Reflection\Types\Null_;
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
     * @Vich\UploadableField(mapping="images", fileNameProperty="picture")
     * @Assert\File(
     * maxSize = "1M",
     * mimeTypes = {"image/jpeg", "image/png", "image/jpg"},
     * )
     * @var File|null
     */
    private $pictureFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     **/
    private ?string $picture = null;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTimeInterface|null
     */
    private ?DateTimeInterface $updatedAt;

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

    public function __construct()
    {
        $this->updatedAt = new DateTimeImmutable();
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $pictureFile
     */
    public function setPictureFile(?File $pictureFile = null): void
    {
        $this->pictureFile = $pictureFile;

        if (null !== $pictureFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

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

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

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
