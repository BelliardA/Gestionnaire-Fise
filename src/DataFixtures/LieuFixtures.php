<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Lieu;

class LieuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $parkNames = [
            "BMX park world cup",
            "BMX street",
            "FlatLand",
            "Skate street",
            "Skate park world cup",
            "Roller park",
            "Roller street",
        ];

        foreach($parkNames as $parkName) {
            $lieu = new Lieu();

            $lieu->setNom($parkName);
            $lieu->setNiveau(rand(1, 4));

            $manager->persist($lieu);
        }

        $manager->flush();
    }
}
