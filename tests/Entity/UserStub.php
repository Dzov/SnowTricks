<?php

namespace App\Tests\Entity;

use App\Entity\User;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class UserStub extends User
{
    const ACTIVATED = true;

    const AVATAR = 'avatar.png';

    const EMAIL = 'email@test.com';

    const FIRST_NAME = 'User first name';

    const ID = 8789;

    const LAST_NAME = 'User last name';

    const PASSWORD = 'User password';

    const REGISTERED_AT = '2017-08-19 00:00:00';

    const USERNAME = 'User username';

    protected $activated = self::ACTIVATED;

    protected $avatar = self::AVATAR;

    protected $email = self::EMAIL;

    protected $firstName = self::FIRST_NAME;

    protected $id = self::ID;

    protected $lastName = self::LAST_NAME;

    protected $password = self::PASSWORD;

    protected $username = self::USERNAME;

    public function __construct()
    {
        $this->registeredAt = new \DateTime(self::REGISTERED_AT);
    }
}
