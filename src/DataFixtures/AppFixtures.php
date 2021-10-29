<?php

namespace App\DataFixtures;

use App\Entity\Proprietaire;
use App\Entity\Restaurant;
use App\Entity\Ville;
use App\Repository\VilleRepository;
use App\Repository\RestaurantRepository;
use App\Repository\ProprietaireRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        // Villes
            $paris = new Ville();
            $paris->setNom("Paris");
            $manager->persist($paris);

            $rouen = new Ville();
            $rouen->setNom("Rouen");
            $manager->persist($rouen);

            $lyon = new Ville();
            $lyon->setNom("Lyon");
            $manager->persist($lyon);

            // Proprietaires
            $claire = new Proprietaire();
            $claire->setNom("Claire")
                ->setPrenom("Ludovic")
                ->setDateNaissance($faker->dateTime(max: '-20 years'));
            $manager->persist($claire);

            $monsieur = new Proprietaire();
            $monsieur->setNom("Monsieur")
                ->setPrenom("Elle")
                ->setDateNaissance($faker->dateTime(max: '-20 years'));
            $manager->persist($monsieur);

            $henri = new Proprietaire();
            $henri->setNom("Henri")
                ->setPrenom("Edouard")
                ->setDateNaissance($faker->dateTime(max: '-20 years'));
            $manager->persist($henri);

        // Restaurants
            $quick = new Restaurant();
            $quick->setNom("Quick")
                ->setAdress("10 Rue de l'or")
                ->setProprietaire($claire)
                ->setVille($rouen)
                ->setImage($faker->imageUrl(400,400, "food"));
            $manager->persist($quick);

            $mcdo = new Restaurant();
            $mcdo->setNom("McDo")
                ->setAdress("36 rue du test")
                ->setProprietaire($monsieur)
                ->setVille($paris)
                ->setImage($faker->imageUrl(400,400, "food"));
            $manager->persist($mcdo);

            $lapaille = new Restaurant();
            $lapaille->setNom("La Paille")
                ->setAdress("25 boulevard quatorze")
                ->setProprietaire($henri)
                ->setVille($lyon)
                ->setImage($faker->imageUrl(400,400, "food"));
            $manager->persist($mcdo);

        $manager->flush();
    }

}
