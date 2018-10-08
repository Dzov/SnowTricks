<?php

namespace App\Tests;

use App\Entity\Trick;

/**
 * @author Amélie-Dzovinar Haladjian
 */
trait AssertTrick
{
    public function assertTrick(Trick $expected, Trick $actual)
    {
        $this->assertSame($expected->getName(), $actual->getName());
        $this->assertSame($expected->getId(), $actual->getId());
        $this->assertEquals($expected->getUpdatedAt(), $actual->getUpdatedAt());
        $this->assertEquals($expected->getCreatedAt(), $actual->getCreatedAt());
        $this->assertSame($expected->getDescription(), $actual->getDescription());
    }
}

