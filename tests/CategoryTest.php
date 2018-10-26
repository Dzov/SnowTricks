<?php

namespace App;

use App\Entity\Category;
use App\Tests\Entity\CategoryStub;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * @var Category
     */
    private $entity;

    /**
     * @test
     */
    public function assetGetCategory()
    {
        $this->assertSame(CategoryStub::NAME, $this->entity->getName());
        $this->assertSame(CategoryStub::ID, $this->entity->getId());
    }

    /**
     * @test
     */
    public function assertSetCategory()
    {
        $this->entity->setName('new name');
        $this->assertSame('new name', $this->entity->getName());
    }

    protected function setUp()
    {
        parent::setUp();

        $this->entity = new CategoryStub();
    }
}
