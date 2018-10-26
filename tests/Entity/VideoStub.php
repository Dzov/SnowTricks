<?php

namespace App\Tests\Entity;

use App\Entity\Video;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class VideoStub extends Video
{
    const ID = 4654;

    const IFRAME_PATH = 'https://www.youtube.com/embed/Vb2OYGqUbOA';

    const URL = 'https://www.youtube.com/watch?v=Vb2OYGqUbOA';

    protected $id = self::ID;

    protected $iframePath = self::IFRAME_PATH;

    protected $url = self::URL;

    public function __construct()
    {
        $this->trick = new TrickStub1();
    }
}
