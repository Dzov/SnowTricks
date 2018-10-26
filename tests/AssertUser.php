<?php

namespace App\Tests;

use App\Entity\User;

/**
 * @author Amélie-Dzovinar Haladjian
 */
trait AssertUser
{
    public function assertUser(User $expected, User $actual)
    {
        $this->assertSame($expected->getId(), $actual->getId());
        $this->assertSame($expected->getEmail(), $actual->getEmail());
        $this->assertSame($expected->getUsername(), $actual->getUsername());
        $this->assertSame($expected->getActivated(), $actual->getActivated());
        $this->assertSame($expected->getAvatar(), $actual->getAvatar());
        $this->assertSame($expected->getFirstName(), $actual->getFirstName());
        $this->assertSame($expected->getLastName(), $actual->getLastName());
        $this->assertSame($expected->getPassword(), $actual->getPassword());
        $this->assertEquals($expected->getRegisteredAt(), $actual->getRegisteredAt());
    }
}
