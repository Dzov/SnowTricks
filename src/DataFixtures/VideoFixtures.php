<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $video1 = new Video();
        $video1->setTrick($this->getReference('trick1'));
        $video1->setIdentifier('KEdFwJ4SWq4');
        $video1->setPlatformName('youtube');
        $manager->persist($video1);

        $video2 = new Video();
        $video2->setTrick($this->getReference('trick2'));
        $video2->setIdentifier('iKkhKekZNQ8');
        $video2->setPlatformName('youtube');
        $manager->persist($video2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TrickFixtures::class,
        );
    }
}
