<?php

namespace App\EventListener;

use App\Entity\Video;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class VideoUploadListener
{
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

//    public function postLoad(LifecycleEventArgs $eventArgs)
//    {
//        $entity = $eventArgs->getEntity();
//
//        if (!$entity instanceof Video) {
//            return;
//        }
//    }

    private function uploadVideo($entity)
    {
        if (!$entity instanceof Video) {
            return;
        }

        $parsed_url = parse_url($entity->getUrl());

        if (isset($parsed_url['host']) && isset($parsed_url['query'])) {
            $entity->setPlatformName($parsed_url['host']);
            $entity->setIdentifier(substr($parsed_url['query'], 2));
        }
    }
}
