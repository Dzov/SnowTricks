<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTime();

        $trick1 = new Trick();
        $trick1->setDescription('Saisie de la carre backside de la planche, entre les deux pieds, avec la main avant');
        $trick1->setCreatedAt($date);
        $trick1->setCategory($this->getReference('cat1'));
        $trick1->setName('sad');
        $manager->persist($trick1);

        $trick2 = new Trick();
        $trick2->setDescription(
            'Saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière'
        );
        $trick2->setCreatedAt($date->add(new \DateInterval('P1D')));
        $trick2->setCategory($this->getReference('cat1'));
        $trick2->setName('indy');
        $manager->persist($trick2);

        $trick3 = new Trick();
        $trick3->setDescription(
            'Saisie du carre avant et carre arrière avec chaque main (comme tenir un volant de voiture)'
        );
        $trick3->setCreatedAt($date->add(new \DateInterval('PT3H')));
        $trick3->setCategory($this->getReference('cat1'));
        $trick3->setName('truck driver');
        $manager->persist($trick3);

        $trick4 = new Trick();
        $trick4->setDescription(
            'Un tour complet en effectuant une rotation horizontale pendant le saut, puis en attérissant en position switch ou normal'
        );
        $trick4->setCreatedAt($date->add(new \DateInterval('P2DT3H')));
        $trick4->setCategory($this->getReference('cat2'));
        $trick4->setName('360');
        $manager->persist($trick4);

        $trick5 = new Trick();
        $trick5->setDescription(
            'Deux tours complets en effectuant une rotation horizontale pendant le saut, puis en attérissant en position switch ou normal'
        );
        $trick5->setCreatedAt($date->add(new \DateInterval('P4DT3H3M')));
        $trick5->setCategory($this->getReference('cat2'));
        $trick5->setName('720');
        $manager->persist($trick5);

        $trick6 = new Trick();
        $trick6->setDescription(
            'Trois tours complets en effectuant une rotation horizontale pendant le saut, puis en attérissant en position switch ou normal'
        );
        $trick6->setCreatedAt($date->add(new \DateInterval('P1DT6H2M')));
        $trick6->setCategory($this->getReference('cat2'));
        $trick6->setName('1080');
        $manager->persist($trick6);

        $trick7 = new Trick();
        $trick7->setDescription('Rotation verticale avant');
        $trick7->setCreatedAt($date->add(new \DateInterval('P6DT2H9M')));
        $trick7->setUpdatedAt($date->add(new \DateInterval('P12DT12H')));
        $trick7->setCategory($this->getReference('cat3'));
        $trick7->setName('Front flip');
        $manager->persist($trick7);

        $trick8 = new Trick();
        $trick8->setDescription('Rotation verticale arrière');
        $trick8->setCreatedAt($date->add(new \DateInterval('P3DT3H')));
        $trick8->setCategory($this->getReference('cat3'));
        $trick8->setName('Back flip');
        $manager->persist($trick8);

        $trick9 = new Trick();
        $trick9->setDescription('Glisser sur une barre de slide avec l\'avant de la planche sur la barre');
        $trick9->setCreatedAt($date->add(new \DateInterval('P10DT2H')));
        $trick9->setCategory($this->getReference('cat4'));
        $trick9->setName('nose slide');
        $manager->persist($trick9);

        $trick10 = new Trick();
        $trick10->setDescription('Glisser sur une barre de slide avec l\'arrière de la planche sur la barre');
        $trick10->setCreatedAt($date->add(new \DateInterval('PT12H')));
        $trick10->setUpdatedAt($date->add(new \DateInterval('P1DT12H')));
        $trick10->setCategory($this->getReference('cat4'));
        $trick10->setName('tail slide');
        $manager->persist($trick10);

        $manager->flush();

        $this->addReference('trick1', $trick1);
        $this->addReference('trick2', $trick2);
        $this->addReference('trick3', $trick3);
        $this->addReference('trick4', $trick4);
        $this->addReference('trick5', $trick5);
        $this->addReference('trick6', $trick6);
        $this->addReference('trick7', $trick7);
        $this->addReference('trick8', $trick8);
        $this->addReference('trick9', $trick9);
        $this->addReference('trick10', $trick10);
    }

    public function getDependencies()
    {
        return array(
            CategoryFixtures::class,
        );
    }
}
