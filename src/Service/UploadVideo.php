<?php

namespace App\Service;

use App\Entity\Trick;
use App\Entity\Video;
use Symfony\Component\Form\FormInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class UploadVideo
{
    public function uploadVideo(FormInterface $videoUrls, Trick $trick)
    {
        dump($videoUrls->getData());

        foreach ($videoUrls as $videoUrl) {
            $video = new Video;
//            $parsed_url = parse_url($videoUrl);

//            if (isset($parsed_url['host']) && isset($parsed_url['query'])) {
//                $video->setPlatformName($parsed_url['host']);
//                $video->setIdentifier(substr($parsed_url['query'], 2));
//            }

            $trick->addVideo($video);
        }
    }
}
