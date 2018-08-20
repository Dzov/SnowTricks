<?php

namespace App\EventListener;

use App\Entity\Image;
use App\Service\FileUploader;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

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

//    public function preRemoveUpload()
//    {
//        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->url;
//    }
//
//    /**
//     * @ORM\PostRemove()
//     */
//    public function removeUpload()
//    {
//        if (file_exists($this->tempFilename)) {
//            unlink($this->tempFilename);
//        }
//    }

    private function uploadFile($entity)
    {
        if (!$entity instanceof Image) {
            return;
        }

        $fileName = $this->fileUploader->upload($entity->getFile());

        $entity->setFileName($fileName);
        $entity->setPath('uploads/images/' . $fileName);
    }
}
