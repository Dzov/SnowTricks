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
    /**
     * @throws InvalidVideoUrlException
     */
    public function parseUrl(string $url)
    {
        $parsed_url = parse_url($url);

        preg_match("/\.(.*)\./", $parsed_url['host'], $match);
        if (isset($match[1])) {
            $platformName = $match[1];
        } else {
            preg_match("/(.*)\./", $parsed_url['host'], $match2);
            $platformName = $match2[1];
        }

        switch ($platformName) {
            case 'youtube':
                return $this->handleYoutubeVideos($parsed_url);
                break;
            case 'dailymotion':
                return $this->handleDailymotionVideos($parsed_url);
                break;
            case 'vimeo':
                return $this->handleVimeoVideos($parsed_url);
                break;
            default :
                throw new InvalidVideoUrlException();
        }
    }

    private function handleYoutubeVideos(array $parsed_url)
    {
        $identifier = substr($parsed_url['query'], 2);

        return 'https://' . $parsed_url['host'] . '/embed/' . $identifier;
    }

    private function handleDailymotionVideos(array $parsed_url)
    {
        return 'https://' . $parsed_url['host'] . '/embed/' . $parsed_url['path'];
    }

    private function handleVimeoVideos(array $parsed_url)
    {
        return 'https://player.vimeo.com/video' . $parsed_url['path'];
    }
}
