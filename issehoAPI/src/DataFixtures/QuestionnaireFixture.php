<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionnaireFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //set question pour de zero a 10 set question dans la boucle et un add user (repository user) faire une varibale question array dollar réponse prof et parrent quesiton 1 réponse 1

        for ($i = 0; $i < 10  )

        $manager->flush();
    }
}
