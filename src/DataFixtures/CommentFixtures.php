<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTime();

        $comment1 = new Comment();
        $comment1->setContent('I managed this one the other day, it was awesome !');
        $comment1->setPostedAt(new \DateTime());
        $comment1->setTrick($this->getReference('trick5'));
        $comment1->setUser($this->getReference('user2'));
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setContent('This trick is so rad');
        $comment2->setPostedAt(new \DateTime());
        $comment2->setTrick($this->getReference('trick2'));
        $comment2->setUser($this->getReference('user1'));
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setContent('J\'adorerai réussir celui ci mais il me faut plus d\'entrainement');
        $comment3->setPostedAt(new \DateTime());
        $comment3->setTrick($this->getReference('trick3'));
        $comment3->setUser($this->getReference('user1'));
        $manager->persist($comment3);

        $comment3 = new Comment();
        $comment3->setContent('Trop cool !');
        $comment3->setPostedAt($date->add(new \DateInterval('P1D')));
        $comment3->setTrick($this->getReference('trick3'));
        $comment3->setUser($this->getReference('user4'));
        $manager->persist($comment3);

        $comment3 = new Comment();
        $comment3->setContent('Magnifique !');
        $comment3->setPostedAt($date->add(new \DateInterval('P3D')));
        $comment3->setTrick($this->getReference('trick3'));
        $comment3->setUser($this->getReference('user3'));
        $manager->persist($comment3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            TrickFixtures::class,
        );
    }
}
