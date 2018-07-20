<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrickRepository")
 */
class Trick
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="trick")
     */
    private $comments;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="trick")
     */
    private $images;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

//    /**
//     * @var ArrayCollection
//     */
//    private $uploadedFiles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="trick")
     */
    private $videos;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->videos = new ArrayCollection();
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
     * @return Collection|Comment
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
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function setImages(Collection $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function addImages(Collection $images): self
    {
        foreach ($images as $image) {
            $this->images[] = $image;
        }
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function setVideos(Collection $videos): self
    {
        $this->videos = $videos;

        return $this;
    }

//    public function upload()
//    {
//        foreach($this->uploadedFiles as $uploadedFile)
//        {
//            $file = new Image();
//
//            $fileName = sha1(uniqid()).'.'.$uploadedFile->guessExtension();
//            $file->setFileName($fileName);
//
//            $uploadedFile->move($this->getUploadRootDir(), $fileName);
//
//            $this->getImages()->add($file);
//            $file->setTrick($this);
//
//            unset($uploadedFile);
//        }
//    }
//
//    public function getUploadDir()
//    {
//        // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
//        return 'uploads/img';
//    }
//
//    protected function getUploadRootDir()
//    {
//        // On retourne le chemin relatif vers l'image pour notre code PHP
//        return __DIR__.'/../../../../web/'.$this->getUploadDir();
//    }
//
//    /**
//     * @return ArrayCollection
//     */
//    public function getUploadedFiles(): ArrayCollection
//    {
//        return $this->uploadedFiles;
//    }
//
//    public function setUploadedFiles(array $uploadedFiles)
//    {
//        $this->uploadedFiles = $uploadedFiles;
//    }
}
