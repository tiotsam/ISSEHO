<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionnaireFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product(); ffffffff
        // $manager->persist($product);

        $manager->flush();
    }
}