<?php

namespace App\Service;

use App\Entity\Image;
use App\Entity\Trick;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class FileUploader
{
    private $uploadsDirectory;

    private $imagesDirectory;

    public function __construct($uploadsDirectory, $imagesDirectory)
    {
        $this->uploadsDirectory = $uploadsDirectory;
        $this->imagesDirectory = $imagesDirectory;
    }

    public function upload(UploadedFile $uploadedFile = null)
    {
        if (null === $uploadedFile) {
            return null;
        }

        $fileName = md5(uniqid()) . '.' . $uploadedFile->guessExtension();
        $uploadedFile->move($this->getUploadsDirectory(), $fileName);

        return $fileName;
    }

    public function getUploadsDirectory()
    {
        return $this->uploadsDirectory;
    }

    public function getImagesDirectory()
    {
        return $this->imagesDirectory;
    }
}
