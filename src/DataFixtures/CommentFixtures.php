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
        $date = new \DateTimeImmutable();

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
        $comment3->setContent('J\'adorerais réussir celui ci mais il me faut plus d\'entrainement');
        $comment3->setPostedAt(new \DateTime());
        $comment3->setTrick($this->getReference('trick3'));
        $comment3->setUser($this->getReference('user1'));
        $manager->persist($comment3);

        $comment4 = new Comment();
        $comment4->setContent('Nice video !');
        $comment4->setPostedAt($date->add(new \DateInterval('P7DT23H')));
        $comment4->setTrick($this->getReference('trick10'));
        $comment4->setUser($this->getReference('user4'));
        $manager->persist($comment4);

        $comment5 = new Comment();
        $comment5->setContent('Magnifique !');
        $comment5->setPostedAt($date->add(new \DateInterval('P15DT4H5M')));
        $comment5->setTrick($this->getReference('trick10'));
        $comment5->setUser($this->getReference('user1'));
        $manager->persist($comment5);

        $comment6 = new Comment();
        $comment6->setContent('That was the first trick I mastered');
        $comment6->setPostedAt($date->add(new \DateInterval('P16DT15H15M')));
        $comment6->setTrick($this->getReference('trick10'));
        $comment6->setUser($this->getReference('user2'));
        $manager->persist($comment6);

        $comment7 = new Comment();
        $comment7->setContent('And it\'s super fun');
        $comment7->setPostedAt($date->add(new \DateInterval('P18DT4H7M')));
        $comment7->setTrick($this->getReference('trick10'));
        $comment7->setUser($this->getReference('user2'));
        $manager->persist($comment7);

        $comment8 = new Comment();
        $comment8->setContent('Cool how long did it take you ? ');
        $comment8->setPostedAt($date->add(new \DateInterval('P18DT5H6M')));
        $comment8->setTrick($this->getReference('trick10'));
        $comment8->setUser($this->getReference('user3'));
        $manager->persist($comment8);

        $comment9 = new Comment();
        $comment9->setContent('With a lot of practice, maybe a couple weeks');
        $comment9->setPostedAt($date->add(new \DateInterval('P3DT18H23M')));
        $comment9->setTrick($this->getReference('trick10'));
        $comment9->setUser($this->getReference('user2'));
        $manager->persist($comment9);

        $comment10 = new Comment();
        $comment10->setContent('Easy');
        $comment10->setPostedAt($date->add(new \DateInterval('P3D')));
        $comment10->setTrick($this->getReference('trick10'));
        $comment10->setUser($this->getReference('user5'));
        $manager->persist($comment10);

        $comment11 = new Comment();
        $comment11->setContent('Gotta try it !');
        $comment11->setPostedAt($date->add(new \DateInterval('P3DT2H55M')));
        $comment11->setTrick($this->getReference('trick10'));
        $comment11->setUser($this->getReference('user3'));
        $manager->persist($comment11);

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
