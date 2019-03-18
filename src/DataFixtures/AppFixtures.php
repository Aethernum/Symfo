<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\TypeEvenement;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class AppFixtures extends Fixture
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // php bin/console doctrine:fixtures:load
        $faker = \Faker\Factory::create();
        //create 10 User
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setUsername($faker->lastName());
            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            $manager->persist($user);
        }
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
