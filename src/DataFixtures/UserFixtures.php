<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setFirstName('John');
        $user1->setLastName('Simmons');
        $user1->setEmail('john.simmons@gmail.com');
        $user1->setPassword(sha1('john'));
        $user1->setActivated(true);
        $user1->setRegisteredAt(new \DateTime());
        $manager->persist($user1);

        $user2 = new User();
        $user2->setFirstName('Sam');
        $user2->setLastName('Sander');
        $user2->setEmail('sam.sander@gmail.com');
        $user2->setPassword(sha1('sam'));
        $user2->setActivated(true);
        $user2->setRegisteredAt(new \DateTime());
        $manager->persist($user2);

        $user3 = new User();
        $user3->setFirstName('Alex');
        $user3->setLastName('Shaw');
        $user3->setEmail('alex.shaw@gmail.com');
        $user3->setPassword(sha1('alex'));
        $user3->setActivated(true);
        $user3->setRegisteredAt(new \DateTime());
        $manager->persist($user3);

        $user4 = new User();
        $user4->setFirstName('Ahmad');
        $user4->setLastName('Tiha');
        $user4->setEmail('ahmad.tiha@gmail.com');
        $user4->setPassword(sha1('Ahmad'));
        $user4->setActivated(true);
        $user4->setRegisteredAt(new \DateTime());
        $manager->persist($user4);

        $user5 = new User();
        $user5->setFirstName('Kimmy');
        $user5->setLastName('Gale');
        $user5->setEmail('kimmy.gale@gmail.com');
        $user5->setPassword(sha1('kimmy'));
        $user5->setActivated(true);
        $user5->setRegisteredAt(new \DateTime());
        $manager->persist($user5);

        $manager->flush();

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
        $this->addReference('user4', $user4);
        $this->addReference('user5', $user5);
    }
}
