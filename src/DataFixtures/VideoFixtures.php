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
        $video1->setUrl('https://www.youtube.com/watch?v=KEdFwJ4SWq4');
        $video1->setIframePath('https://www.youtube.com/embed/KEdFwJ4SWq4');
        $manager->persist($video1);

        $video2 = new Video();
        $video2->setTrick($this->getReference('trick2'));
        $video2->setUrl('https://www.youtube.com/watch?v=iKkhKekZNQ8');
        $video2->setIframePath('https://www.youtube.com/embed/iKkhKekZNQ8');
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
