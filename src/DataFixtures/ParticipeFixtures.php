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

        $epreuvesBySport = [];

        // Grouper les épreuves par sport
        foreach ($epreuves as $epreuve) {
            $epreuvesBySport[$epreuve->getSport()][] = $epreuve;
        }

        foreach ($sportifs as $sportif) {
            $sport = $sportif->getSport();
            
            // Vérifier s'il y a des épreuves pour le sport du sportif
            if (!empty($epreuvesBySport[$sport])) {
                // Répartir les sportifs de manière cyclique sur les épreuves disponibles
                $epreuveIndex = array_rand($epreuvesBySport[$sport]);
                $epreuve = $epreuvesBySport[$sport][$epreuveIndex];

                $participe = new Participe();
                $participe->setSportif($sportif);
                $participe->setEpreuve($epreuve);
                $manager->persist($participe);
            }
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
