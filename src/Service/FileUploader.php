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
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $uploadedFile = null)
    {
        if (null === $uploadedFile) {
            return null;
        }

        $fileName = md5(uniqid()) . '.' . $uploadedFile->guessExtension();
        $uploadedFile->move($this->getTargetDirectory(), $fileName);

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}
