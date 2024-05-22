<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\SportifRepository;
use App\Repository\EpreuveRepository;
use App\Entity\Participe;
use App\Entity\Sportif;
use App\Entity\Epreuve;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ParticipeFixtures extends Fixture implements DependentFixtureInterface
{

    public function __construct(private SportifRepository $sportifRepository, private EpreuveRepository $epreuveRepository)
    {
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $sportifs = $this->sportifRepository->findAll();
        $epreuves = $this->epreuveRepository->findAll();

        foreach ($sportifs as $sportif) {
            $participe = new Participe();
            $participe->setSportif($sportif);
            $participe->setEpreuve($epreuves[array_rand($epreuves)]);

            $manager->persist($participe);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EpreuveFixtures::class,
            SportifFixtures::class
        ];
    }
}
