<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 * @Vich\Uploadable
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
     * @Vich\UploadableField(mapping="images", fileNameProperty="beforePicture")
     * @Assert\File(
     * maxSize = "1M",
     * mimeTypes = {"image/jpeg", "image/png", "image/jpg"},
     * )
     * @var File|null
     */
    private $beforePictureFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $beforePicture = null;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="afterPicture")
     * @Assert\File(
     * maxSize = "1M",
     * mimeTypes = {"image/jpeg", "image/png", "image/jpg"},
     * )
     * @var File|null
     */
    private $afterPictureFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $afterPicture = null;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTimeInterface|null
     */
    private ?DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $beforePictureFile
     */
    public function setBeforePictureFile(?File $beforePictureFile = null): void
    {
        $this->beforePictureFile = $beforePictureFile;

        if (null !== $beforePictureFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getBeforePictureFile(): ?File
    {
        return $this->beforePictureFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $afterPictureFile
     */
    public function setAfterPictureFile(?File $afterPictureFile = null): void
    {
        $this->afterPictureFile = $afterPictureFile;

        if (null !== $afterPictureFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getAfterPictureFile(): ?File
    {
        return $this->afterPictureFile;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

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

    public function setBeforePicture(?string $beforePicture): self
    {
        $this->beforePicture = $beforePicture;

        return $this;
    }

    public function getAfterPicture(): ?string
    {
        return $this->afterPicture;
    }

    public function setAfterPicture(?string $afterPicture): self
    {
        $this->afterPicture = $afterPicture;

        return $this;
    }
}
