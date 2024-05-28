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
            ['name' => "Park world cup", 'niveau' => 4, 'img' => "pwc.jpg"],
            ['name' => "Street park", 'niveau' => 3,'img' => "street.jpg"],
            ['name' => "FlatLand", 'niveau' => 2,'img' => "flat.jpg"],
            ['name' => "Park Amateur", 'niveau' => 1,'img' => "amateur.jpg"],
            ['name' => "Spin Ramp", 'niveau' => 4,'img' => "spinramp.jpg"],
        ];

        foreach($parkNames as $parkName) {
            $lieu = new Lieu();

            $lieu->setNom($parkName['name']);
            $lieu->setNiveau($parkName['niveau']);
            $lieu->setImg($parkName['img']);

            $manager->persist($lieu);
        }

        $manager->flush();
    }
}
