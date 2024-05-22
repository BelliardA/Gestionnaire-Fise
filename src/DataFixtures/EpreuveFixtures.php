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

        $lieux = $this->lieuRepository->findAll();

        $sportsData = [
            'BMX' => [
                'date' => ['2024-06-08 14:00:00', '2024-06-09 15:30:00', '2024-06-11 15:00:00']
            ],
            'Skateboard' => [
                'date' => ['2024-06-08 12:00:00', '2024-06-09 14:30:00', '2024-06-10 20:00:00']
            ],
            'Roller' => [
                'date' => ['2024-06-08 10:00:00', '2024-06-09 12:30:00', '2024-06-10 18:00:00']
            ],
            'Trottinette' => [
                'date' => ['2024-06-08 16:00:00', '2024-06-09 18:30:00', '2024-06-11 16:00:00']
            ]
        ];

        foreach ($sportsData as $sport => $data) {
            foreach ($data['date'] as $i => $date) {
                $lieu = $faker->randomElement($lieux);
                $this->addData($sport, $date, $lieu, $manager, $i);
            }
        }

        $manager->flush();
    }

    function addData($sport, $date, $lieu, $manager, $i){
        $epreuve = new Epreuve();
        $degre = ($i == 0) ? 'Qualification' : (($i == 1) ? 'Demi finale' : 'Finale');
        $epreuve->setDegre($degre);
        $epreuve->setLieu($lieu);
        $date = new \DateTime($date);
        $epreuve->setDate($date);
        $epreuve->setSport($sport);

        $manager->persist($epreuve);
    }   

    public function getDependencies()
    {
        return [
            LieuFixtures::class
        ];
    }
}
