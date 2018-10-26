<?php

namespace App\Tests;

use App\Entity\Video;
use App\Tests\Entity\TrickStub2;
use App\Tests\Entity\VideoStub;
use PHPUnit\Framework\TestCase;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class VideoTest extends TestCase
{
    use AssertTrick;

    /**
     * @var Video
     */
    private $entity;

    /**
     * @test
     */
    public function getVideo()
    {
        $this->assertSame(VideoStub::ID, $this->entity->getId());
        $this->assertSame(VideoStub::URL, $this->entity->getUrl());
        $this->assertSame(VideoStub::IFRAME_PATH, $this->entity->getIframePath());
    }

    /**
     * @test
     */
    public function setVideo()
    {
        $trick = new TrickStub2();
        $this->entity->setTrick($trick);
        $this->entity->setIframePath('https://www.dailymotion.com/embed/32E4TV');
        $this->entity->setUrl('https://www.dailymotion.com/video/32E4TV');


        $this->assertSame('https://www.dailymotion.com/embed/32E4TV', $this->entity->getIframePath());
        $this->assertSame('https://www.dailymotion.com/video/32E4TV', $this->entity->getUrl());
        $this->assertTrick($trick, $this->entity->getTrick());
    }

    protected function setUp()
    {
        parent::setUp();

        $this->entity = new VideoStub();
    }
}
