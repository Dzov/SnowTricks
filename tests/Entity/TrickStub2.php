<?php

namespace App\Tests\Entity;

use App\Entity\Trick;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class TrickStub2 extends Trick
{
    const ID = 23532;

    const CREATED_AT = '2018-12-25 00:00:00';

    const DESCRIPTION = 'Trick description 2';

    const NAME = 'Trick name 2';

    const UPDATED_AT = '2019-10-10 00:00:00';

    protected $id = self::ID;

    protected $description = self::DESCRIPTION;

    protected $name = self::NAME;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->createdAt = new \DateTime(self::CREATED_AT);
        $this->updatedAt = new \DateTime(self::UPDATED_AT);
        $this->category = new CategoryStub();
    }
}
