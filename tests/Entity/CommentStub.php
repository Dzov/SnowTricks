<?php

namespace App\Tests\Entity;

use App\Entity\Comment;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class CommentStub extends Comment
{
    const ID = 3643;

    const CONTENT = 'Comment content';

    const POSTED_AT = '2018-10-27 00:00:00';

    protected $id = self::ID;

    protected $content = self::CONTENT;

    protected $postedAt = self::POSTED_AT;

    public function __construct()
    {
        $this->trick = new TrickStub1();
        $this->user = new UserStub();
        $this->postedAt = new \DateTime(self::POSTED_AT);
    }
}
