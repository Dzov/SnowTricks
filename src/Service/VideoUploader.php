<?php

namespace App\Service;

use App\Entity\Trick;
use App\Entity\Video;
use App\Exception\InvalidVideoUrlException;
use Symfony\Component\Form\FormInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class VideoUploader
{
    const YOUTUBE_PATTERN = "/^((https)?(.*)(youtu.?be)(\.?[a-z]+)?\/([a-z]+)?(\??[a-z]=)?\/?)([a-zA-Z0-9]+)$/";

    const DAILYMOTION_PATTERN = "/^((https)?(.*)(dai.?ly)(motion.com)?\/(([^0-9][a-z]+)([^0-9][a-z]+)?\/)?)([a-zA-Z0-9]+)$/";

    const VIMEO_PATTERN = "/^(https)?(.*)(player.vimeo|vimeo)(.*)\/([^0-9][a-z]+\/)?([a-zA-Z0-9]+)$/";

    /**
     * @throws InvalidVideoUrlException
     */
    public function parseUrl(string $url)
    {
        switch (true) {
            case (preg_match(self::YOUTUBE_PATTERN, $url, $matches)):
                return $this->handleYoutubeVideos(array_pop($matches));
                break;
            case (preg_match(self::DAILYMOTION_PATTERN, $url, $matches)):
                return $this->handleDailymotionVideos(array_pop($matches));
                break;
            case (preg_match(self::VIMEO_PATTERN, $url, $matches)):
                return $this->handleVimeoVideos(array_pop($matches));
                break;
            default :
                throw new InvalidVideoUrlException();
        }
    }

    private function handleYoutubeVideos(string $identifier)
    {
        return 'https://www.youtube.com/embed/' . $identifier;
    }

    private function handleDailymotionVideos(string $identifier)
    {
        return 'https://www.dailymotion.com/embed/video/' . $identifier;
    }

    private function handleVimeoVideos(string $identifier)
    {
        return 'https://player.vimeo.com/video/' . $identifier;
    }
}
