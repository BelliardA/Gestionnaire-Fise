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
            ['name' => "Park world cup", 'niveau' => 4],
            ['name' => "Street park", 'niveau' => 3],
            ['name' => "FlatLand", 'niveau' => 2],
            ['name' => "Park Amateur", 'niveau' => 1],
            ['name' => "Spin Ramp", 'niveau' => 4],
        ];

        foreach($parkNames as $parkName) {
            $lieu = new Lieu();

            $lieu->setNom($parkName['name']);
            $lieu->setNiveau($parkName['niveau']);

            $manager->persist($lieu);
        }

        $manager->flush();
    }
}
