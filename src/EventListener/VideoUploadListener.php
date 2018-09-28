<?php

namespace App\EventListener;

use App\Entity\Video;
use App\Service\VideoUploader;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class VideoUploadListener
{
    /**
     * @var VideoUploader
     */
    private $videoUploader;

    public function __construct(VideoUploader $videoUploader)
    {
        $this->videoUploader = $videoUploader;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();

        $this->uploadVideo($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadVideo($entity);
    }

    private function uploadVideo($entity)
    {
        if (!$entity instanceof Video) {
            return;
        }

        if (null !== $entity->getUrl()) {
            $iframePath = $this->videoUploader->parseUrl($entity->getUrl());

            $entity->setIframePath($iframePath);
        }
    }
}
