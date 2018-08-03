<?php

namespace App\Service;

use App\Entity\Image;
use App\Entity\Trick;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ImageUploader
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    private function upload(UploadedFile $uploadedFile)
    {
        $fileName = md5(uniqid()) . '.' . $uploadedFile->guessExtension();

        $path = 'uploads/images/' . $fileName;

        $uploadedFile->move($this->getTargetDirectory(), $fileName);

        $image = new Image();
        $image->setFileName($fileName);
        $image->setFile($uploadedFile);
        $image->setPath($path);

        return $image;
    }

    public function uploadTrickImages(Trick $trick)
    {
        $files = $trick->getImages();

        foreach ($files as $file) {

            if ($file->getFile() instanceof UploadedFile) {
                $uploadedFile = $file->getFile();
                $image = $this->upload($uploadedFile);

                $image->setTrick($trick);
                $trick->addImage($image);
            }
        }
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}
