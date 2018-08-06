<?php

namespace App\EventListener;

use App\Entity\Image;
use App\Service\FileUploader;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

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

    public function uploadFile($entity)
    {
        if (!$entity instanceof Image) {
            return;
        }

        $fileName = $this->fileUploader->upload($entity->getFile());
        $entity->setFileName($fileName);
        $entity->setPath('uploads/images/' . $fileName);
    }
}
