<?php

namespace App\Tests;

use App\Entity\Trick;
use App\Tests\Entity\TrickStub1;
use App\Tests\Entity\TrickStub2;
use PHPUnit\Framework\TestCase;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class TrickTest extends TestCase
{
    use AssertTrick;

    /**
     * @var Trick
     */
    private $entity;

    /**
     * @test
     */
    public function getTrick()
    {
        $this->assertTrick(new TrickStub1(), $this->entity);
    }

    /**
     * @test
     */
    public function setTrick()
    {
        $this->entity->setName(TrickStub2::NAME);
        $this->entity->setCreatedAt(new \DateTime(TrickStub2::CREATED_AT));
        $this->entity->setUpdatedAt(new \DateTime(TrickStub2::UPDATED_AT));
        $this->entity->setDescription(TrickStub2::DESCRIPTION);

        $this->assertSame(TrickStub2::NAME, $this->entity->getName());
        $this->assertSame(TrickStub2::DESCRIPTION, $this->entity->getDescription());
        $this->assertEquals(new \DateTime(TrickStub2::UPDATED_AT), $this->entity->getUpdatedAt());
        $this->assertEquals(new \DateTime(TrickStub2::CREATED_AT), $this->entity->getCreatedAt());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->entity = new TrickStub1();
    }
}

