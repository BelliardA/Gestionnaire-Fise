<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Sportif;
use Faker\Factory;

class SportifFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_CH');

        for ($i = 0; $i < 10; $i++) {
            $sportif = new Sportif();
            $sportif->setNom($faker->lastName);
            $sportif->setPrenom($faker->firstName);
            $sportif->setAge($faker->numberBetween(16, 40));
            $sportif->setSport($faker->randomElement(['BMX', 'Skate', 'Roller']));

            $manager->persist($sportif);
        }

        $manager->flush();
    }
}
