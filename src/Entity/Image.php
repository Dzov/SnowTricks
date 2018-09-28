<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var UploadedFile
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @var string
     */
    private $tempFileName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trick", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

    public function getId()
    {
        return $this->id;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file = null): self
    {
        $this->file = $file;

        if ($file instanceof UploadedFile) {
            $this->setFileName(null);
        }

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName = null): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getTrick(): Trick
    {
        return $this->trick;
    }

    public function setTrick(Trick $trick): self
    {
        $this->trick = $trick;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path = null): self
    {
        $this->path = $path;

        return $this;
    }

    public function getTempFileName(): ?string
    {
        return $this->tempFileName;
    }

    public function setTempFileName(string $tempFileName = null): self
    {
        $this->tempFileName = $tempFileName;

        return $this;
    }
}
