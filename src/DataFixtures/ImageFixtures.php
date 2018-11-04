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
        $image1->setPath('img/indy.jpg');
        $image1->setTrick($this->getReference('trick2'));
        $manager->persist($image1);

        $image2 = new Image();
        $image2->setFileName('sad.jpg');
        $image2->setPath('img/sad.jpg');
        $image2->setTrick($this->getReference('trick1'));
        $manager->persist($image2);

        $image3 = new Image();
        $image3->setFileName('truckDriver.jpg');
        $image3->setPath('img/truckDriver.jpg');
        $image3->setTrick($this->getReference('trick3'));
        $manager->persist($image3);

        $image4 = new Image();
        $image4->setFileName('360.jpg');
        $image4->setPath('img/360.jpg');
        $image4->setTrick($this->getReference('trick4'));
        $manager->persist($image4);

        $image5 = new Image();
        $image5->setFileName('720.jpg');
        $image5->setPath('img/720.jpg');
        $image5->setTrick($this->getReference('trick5'));
        $manager->persist($image5);

        $image6 = new Image();
        $image6->setFileName('1080.jpg');
        $image6->setPath('img/1080.jpg');
        $image6->setTrick($this->getReference('trick6'));
        $manager->persist($image6);

        $image7 = new Image();
        $image7->setFileName('frontflip.jpg');
        $image7->setPath('img/frontflip.jpg');
        $image7->setTrick($this->getReference('trick7'));
        $manager->persist($image7);

        $image8 = new Image();
        $image8->setFileName('backflip.jpg');
        $image8->setPath('img/backflip.jpg');
        $image8->setTrick($this->getReference('trick8'));
        $manager->persist($image8);

        $image9 = new Image();
        $image9->setFileName('noseslide.jpg');
        $image9->setPath('img/noseslide.jpg');
        $image9->setTrick($this->getReference('trick9'));
        $manager->persist($image9);

        $image10 = new Image();
        $image10->setFileName('tailslide.jpg');
        $image10->setPath('img/tailslide.jpg');
        $image10->setTrick($this->getReference('trick10'));
        $manager->persist($image10);

        $manager->flush();
    }
}
