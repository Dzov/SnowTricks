<?php

namespace App\Tests;

use App\Entity\User;
use App\Tests\Entity\UserStub;
use App\Tests\Entity\UserStub2;
use PHPUnit\Framework\TestCase;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class UserTest extends TestCase
{
    use AssertUser;

    /**
     * @var User
     */
    private $entity;

    /**
     * @test
     */
    public function getUser()
    {
        $this->assertUser(new UserStub(), $this->entity);
    }

    /**
     * @test
     */
    public function setUser()
    {
        $registeredAt = new \DateTime();
        $this->entity->setRegisteredAt($registeredAt);
        $this->entity->setActivated(UserStub2::ACTIVATED);
        $this->entity->setAvatar(UserStub2::AVATAR);
        $this->entity->setUsername(UserStub2::EMAIL);
        $this->entity->setEmail(UserStub2::EMAIL);
        $this->entity->setFirstName(UserStub2::FIRST_NAME);
        $this->entity->setLastName(UserStub2::LAST_NAME);
        $this->entity->setPassword(UserStub2::PASSWORD);

        $this->assertSame(UserStub2::ACTIVATED, $this->entity->getActivated());
        $this->assertSame(UserStub2::AVATAR, $this->entity->getAvatar());
        $this->assertSame(UserStub2::EMAIL, $this->entity->getUsername());
        $this->assertSame(UserStub2::EMAIL, $this->entity->getEmail());
        $this->assertSame(UserStub2::FIRST_NAME, $this->entity->getFirstName());
        $this->assertSame(UserStub2::LAST_NAME, $this->entity->getLastName());
        $this->assertSame(UserStub2::PASSWORD, $this->entity->getPassword());
        $this->assertEquals($registeredAt, $this->entity->getRegisteredAt());
    }

    protected function setUp()
    {
        parent::setUp();

        $this->entity = new UserStub();
    }
}
