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
        $user1->setPassword(password_hash('john', PASSWORD_BCRYPT));
        $user1->setActivated(true);
        $user1->setRegisteredAt(new \DateTime());
        $user1->setAvatar('johnAvatar.jpeg');
        $user1->setToken('na');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setFirstName('Sam');
        $user2->setLastName('Sander');
        $user2->setEmail('sam.sander@gmail.com');
        $user2->setPassword(password_hash('sam', PASSWORD_BCRYPT));
        $user2->setActivated(true);
        $user2->setRegisteredAt(new \DateTime());
        $user2->setAvatar('samAvatar.png');
        $user2->setToken('na');
        $manager->persist($user2);

        $user3 = new User();
        $user3->setFirstName('Alex');
        $user3->setLastName('Shaw');
        $user3->setEmail('alex.shaw@gmail.com');
        $user3->setPassword(password_hash('alex', PASSWORD_BCRYPT));
        $user3->setActivated(true);
        $user3->setRegisteredAt(new \DateTime());
        $user3->setAvatar('alexAvatar.png');
        $user3->setToken('na');
        $manager->persist($user3);

        $user4 = new User();
        $user4->setFirstName('Ahmed');
        $user4->setLastName('Tiha');
        $user4->setEmail('ahmed.tiha@gmail.com');
        $user4->setPassword(password_hash('Ahmad', PASSWORD_BCRYPT));
        $user4->setActivated(true);
        $user4->setRegisteredAt(new \DateTime());
        $user4->setAvatar('ahmedAvatar.jpeg');
        $user4->setToken('na');
        $manager->persist($user4);

        $user5 = new User();
        $user5->setFirstName('Kimmy');
        $user5->setLastName('Gale');
        $user5->setEmail('kimmy.gale@gmail.com');
        $user5->setPassword(password_hash('kimmy', PASSWORD_BCRYPT));
        $user5->setActivated(true);
        $user5->setRegisteredAt(new \DateTime());
        $user5->setAvatar('kimmyAvatar.jpeg');
        $user5->setToken('na');
        $manager->persist($user5);

        $manager->flush();

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
        $this->addReference('user4', $user4);
        $this->addReference('user5', $user5);
    }
}
