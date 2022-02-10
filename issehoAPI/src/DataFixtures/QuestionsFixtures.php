<?php

namespace App\DataFixtures;

use App\Entity\Questions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $questionsProf = array('Quelle a été votre motivation pour devenir enseignant ?','Où enseignez-vous habituellement ?',"Comment avez-vous connu ISSEHO.com ?");
        $questionsParent = array('Comment avez-vous connu ISSEHO.com ?','Pourquoi avoir fait des enfants ?', 'Quelle aide recherchez vous ?');

        for ($i=0; $i < sizeof($questionsProf); $i++) { 
            $questProf = new Questions;
            $questProf->setLabel($questionsProf[$i])
            ->setCible('Prof');
            $manager->persist($questProf);
        }

        for ($j=0; $j < sizeof($questionsParent); $j++) { 
            $questParent = new Questions;
            $questParent->setLabel($questionsParent[$j])
            ->setCible('Parent');
            $manager->persist($questParent);
        }

        $manager->flush();
    }
}
