<?php

namespace App\DataFixtures;

use App\Entity\Niveau;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NiveauFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $niveaux = array('CP','CE1','CE2','CM1','CM2','6ème','5ème','4ème','3ème','2nde','1ère','terminale','BEP','CAP','BAC PRO');

        foreach($niveaux as $niveau){

            $level = new Niveau;
            $level->setNom($niveau);
            $manager->persist($level);
        }

        $manager->flush();
    }
}
