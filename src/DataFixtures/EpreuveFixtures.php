<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Epreuve;
use App\Etity\Lieu;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Repository\LieuRepository;

class EpreuveFixtures extends Fixture implements DependentFixtureInterface
{

    public function __construct(private LieuRepository $lieuRepository)
    {
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_CH');

        $lieu = $this->lieuRepository->findAll();

        for ($i = 0; $i < 10; $i++) {
            $epreuve = new Epreuve();
            $epreuve->setDate($faker->dateTimeInInterval('+2 weeks', '+5 days'));
            $epreuve->setDegre($faker->randomElement(['8eme de finale', 'Quart de finale', 'Demi finale', 'Finale']));
            $epreuve->setSport($faker->randomElement(['BMX', 'Skate', 'Roller']));
            $epreuve->setLieu($faker->randomElement($lieu));
            

            $manager->persist($epreuve);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            LieuFixtures::class
        ];
    }
}
