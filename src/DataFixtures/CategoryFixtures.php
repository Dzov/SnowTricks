<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cat1 = new Category();
        $cat1->setName('Grabs');
        $manager->persist($cat1);

        $cat2 = new Category();
        $cat2->setName('Rotations');
        $manager->persist($cat2);

        $cat3 = new Category();
        $cat3->setName('Flips');
        $manager->persist($cat3);

        $cat4 = new Category();
        $cat4->setName('Slides');
        $manager->persist($cat4);

        $cat5 = new Category();
        $cat5->setName('One Foot');
        $manager->persist($cat5);

        $cat6 = new Category();
        $cat6->setName('Old school');
        $manager->persist($cat6);

        $manager->flush();

        $this->addReference('cat1', $cat1);
        $this->addReference('cat2', $cat2);
        $this->addReference('cat3', $cat3);
        $this->addReference('cat4', $cat4);
        $this->addReference('cat5', $cat5);
        $this->addReference('cat6', $cat6);
    }
}
