<?php

namespace App\Tests;

use App\Entity\Comment;
use App\Tests\Entity\CommentStub;
use App\Tests\Entity\TrickStub2;
use App\Tests\Entity\UserStub2;
use PHPUnit\Framework\TestCase;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class CommentTest extends TestCase
{
    use AssertTrick;
    use AssertUser;

    /**
     * @var Comment
     */
    private $entity;

    /**
     * @test
     */
    public function setComment()
    {
        $trick = new TrickStub2();
        $user = new UserStub2();
        $postedAt = new \DateTime('2019-06-13 00:00:00');
        $this->entity->setTrick($trick);
        $this->entity->setContent('new content');
        $this->entity->setPostedAt($postedAt);
        $this->entity->setUser($user);

        $this->assertTrick($trick, $this->entity->getTrick());
        $this->assertSame('new content', $this->entity->getContent());
        $this->assertSame($postedAt, $this->entity->getPostedAt());
    }

    /**
     * @test
     */
    public function getComment()
    {
        $this->assertSame(CommentStub::CONTENT, $this->entity->getContent());
        $this->assertEquals(new \DateTime(CommentStub::POSTED_AT), $this->entity->getPostedAt());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->entity = new CommentStub();
    }
}
