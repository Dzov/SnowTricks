<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
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

//    /**
//     * @var UploadedFile[]
//     */
//    private $files;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trick", cascade={"persist"}, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

    public function getId()
    {
        return $this->id;
    }

//    public function getFiles(): ?array
//    {
//        return $this->files;
//    }
//
//    public function setFiles(array $files = []): self
//    {
//        $this->files = $files;
//
//        return $this;
//    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
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

//    public function upload(string $dir, Trick $trick)
//    {
//
//        foreach ($this->files as $file) {
//            if (null === $file) {
//                return;
//            }
//
//            $filename = md5(uniqid()) . $file->getClientOriginalName() . $file->guessExtension();
//
//            $file->move($dir, $filename);
//
//            $this->fileName = $filename;
//        }
//    }
}
