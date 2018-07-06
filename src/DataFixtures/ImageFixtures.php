<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return array(
            TrickFixtures::class,
        );
    }

    public function load(ObjectManager $manager)
    {
        $image1 = new Image();
        $image1->setFileName('indy.jpg');
        $image1->setTrick($this->getReference('trick2'));
        $manager->persist($image1);

        $image2 = new Image();
        $image2->setFileName('sad.jpg');
        $image2->setTrick($this->getReference('trick1'));
        $manager->persist($image2);

        $image3 = new Image();
        $image3->setFileName('truckDriver.jpg');
        $image3->setTrick($this->getReference('trick3'));
        $manager->persist($image3);

        $manager->flush();
    }
}
