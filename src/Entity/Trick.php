<?php

namespace App\Entity;

use App\Exception\TrickMustContainOneImageException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrickRepository")
 *
 * @UniqueEntity("name", message="Une figure du même nom existe déjà")
 */
class Trick
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="trick", cascade={"persist", "remove"})
     */
    protected $comments;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="trick", cascade={"persist", "remove"})
     *
     * @Assert\Count(min = 1, minMessage = "Veuillez ajouter au moins une image")
     * @Assert\Valid
     */
    protected $images;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="trick", cascade={"persist", "remove"})
     */
    protected $videos;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId()
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->createdAt = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function setComments(Collection $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @throws TrickMustContainOneImageException
     */
    public function removeImage(Image $image)
    {
        if ($this->images->contains($image) && count($this->images) > 1) {
            $this->images->removeElement($image);

            return $this;
        }

        throw new TrickMustContainOneImageException();
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setTrick($this);
        }

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideos()
    {
        return $this->videos;
    }

    public function removeVideo(Video $video)
    {
        if ($this->videos->contains($video)) {
            $this->videos->removeElement($video);

            return $this;
        }
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->setTrick($this);
        }

        return $this;
    }
}
