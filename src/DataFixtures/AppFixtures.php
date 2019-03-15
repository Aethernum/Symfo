<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\TypeEvenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $type=[];
        // create 3 TypeEvent! Bam!
        $type[0]= new TypeEvenement();
        $type[0]->setLibelleEvenement('Film');
        $type[1]= new TypeEvenement();
        $type[1]->setLibelleEvenement('Theatre');
        $type[2]= new TypeEvenement();
        $type[2]->setLibelleEvenement('Spectacle');
        $manager->persist($type[0]);
        $manager->persist($type[1]);
        $manager->persist($type[2]);
        // create 10 evenement! Bam!
        for ($i = 0; $i < 10; $i++) {
            $evenement = new Evenement();
            $evenement->setNomEvenement('Evenement '.$i);
            $evenement->setDate($faker->dateTimeBetween());
            $evenement->setHeureDebut($faker->dateTime());
            $evenement->setHeureFin($faker->dateTime());
            $evenement->setNombrePlace(rand(1,150));
            $evenement->setCategoriePlace($faker->word());
            $evenement->setTypeEvenements($type[rand(0,2)]);
            $manager->persist($evenement);
        }

        $manager->flush();
    }
}
