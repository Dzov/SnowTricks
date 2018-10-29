<?php

namespace App\EventListener;

use App\Entity\Image;
use App\Service\FileUploader;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class FileUploadListener
{
    /**
     * @var FileUploader
     */
    private $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function postLoad(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();

        if (!$entity instanceof Image) {
            return;
        }

        if (file_exists($this->fileUploader->getImagesDirectory() . '/' . $entity->getFileName()))
        {
            return;
        }
        if (null !== $entity->getFileName()) {
            $entity->setFile(new File($this->fileUploader->getUploadsDirectory() . '/' . $entity->getFileName()));
        }
    }

    private function uploadFile($entity)
    {
        if (!$entity instanceof Image) {
            return;
        }

        $fileName = $this->fileUploader->upload($entity->getFile());

        if (null === $fileName) {
            $fileName = $entity->getFileName();
        }

        $entity->setFileName($fileName);
        $entity->setPath('uploads/images/' . $fileName);
    }
}
