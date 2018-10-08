<?php

namespace App\Tests;

use App\Entity\Image;
use App\Tests\Entity\ImageStub;
use App\Tests\Entity\TrickStub2;
use PHPUnit\Framework\TestCase;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ImageTest extends TestCase
{
    use AssertTrick;

    /**
     * @var Image
     */
    private $entity;

    /**
     * @test
     */
    public function setImage()
    {
        $trick = new TrickStub2();
        $this->entity->setTrick($trick);
        $this->entity->setPath('newpath/image.png');
        $this->entity->setFileName('newfilename.png');

        $this->assertSame('newfilename.png', $this->entity->getFileName());
        $this->assertSame('newpath/image.png', $this->entity->getPath());
        $this->assertTrick($trick, $this->entity->getTrick());
    }

    /**
     * @test
     */
    public function getImage()
    {
        $this->assertSame(ImageStub::ID, $this->entity->getId());
        $this->assertSame(ImageStub::PATH, $this->entity->getPath());
        $this->assertSame(ImageStub::FILENAME, $this->entity->getFileName());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->entity = new ImageStub();
    }
}
