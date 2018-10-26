<?php

namespace App\Tests\Entity;

use App\Entity\Category;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class CategoryStub extends Category
{
    const NAME = 'Category name';

    const ID = 325;

    protected $name = self::NAME;

    protected $id = self::ID;
}
