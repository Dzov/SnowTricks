<?php

namespace App\Tests\Entity;

use App\Entity\Image;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ImageStub extends Image
{
    const ID = 2353;

    const FILENAME = 'Image filename';

    const PATH = 'path/image.png';

    protected $id = self::ID;

    protected $fileName = self::FILENAME;

    protected $path = self::PATH;

    public function __construct()
    {
        $this->trick = new TrickStub1();
    }
}
