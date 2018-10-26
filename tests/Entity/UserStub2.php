<?php

namespace App\Tests\Entity;

use App\Entity\User;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class UserStub2 extends User
{
    const ACTIVATED = false;

    const AVATAR = 'avatar2.png';

    const EMAIL = 'email2@test.com';

    const FIRST_NAME = 'User first name 2';

    const ID = 4539;

    const LAST_NAME = 'User last name 2';

    const PASSWORD = 'User password 2';

    const REGISTERED_AT = '2017-10-19 00:00:00';

    protected $activated = self::ACTIVATED;

    protected $avatar = self::AVATAR;

    protected $email = self::EMAIL;

    protected $firstName = self::FIRST_NAME;

    protected $id = self::ID;

    protected $lastName = self::LAST_NAME;

    protected $password = self::PASSWORD;

    protected $username = self::EMAIL;

    public function __construct()
    {
        $this->registeredAt = new \DateTime(self::REGISTERED_AT);
    }
}
