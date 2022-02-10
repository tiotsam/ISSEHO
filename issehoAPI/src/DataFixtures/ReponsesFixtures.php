<?php

namespace App\DataFixtures;

use App\Entity\Questions;
use App\Entity\Reponses;
use App\Entity\User;
use App\Repository\QuestionsRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ReponsesFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(UserRepository $userRepository, QuestionsRepository $questionsRepository)
    {
        $this->userRepository = $userRepository;
        $this->questionsRepository = $questionsRepository;
    }
    
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $questProfs = new Questions;
        $questParents = new Questions;

        $questProfs = $this->questionsRepository->findBy(array('cible'=>'Prof'));
        $questParents = $this->questionsRepository->findBy(array('cible'=>'Parent'));
        
        $reponsesProf = array("J'adore transmettre mon savoir à ceux qui en ont besoin.","Il faut bien manger.","J'adore les enfants.",'Ecole','Collège','Lycée','Université','Bouche à oreilles','recherche sur internet','la réponse D');
        $reponsesParent = array('Bouche à oreilles.','Recherche sur internet','vu à la télé',"J'ai toujours aimé les enfants.","Besoin de main d'oeuvre","Pas fait exprès","Mon enfant a du mal à suivre à l'école, il a besoin d'aide","Mon enfant s'en sort mais veut s'améliorer","Aider moi mon gosse est nul !");


        for ($i=0; $i < 10; $i++) { 
            $repProf = new Reponses;
            $prof = new User;
            $prof = $this->userRepository->findOneBy(['email' => 'prof'.$i.'@gmail.com']);

            foreach ($questProfs as $key => $question) {
                $repProf->setLabel($reponsesProf[random_int(0,sizeof($reponsesProf)-1)])
                ->setQuestion($question)
                ->setUser($prof);
                $manager->persist($repProf);
            }

            $repParent = new Reponses;
            $parent = new User;
            $parent = $this->userRepository->findOneBy(['email' => 'parent'.$i.'@gmail.com']);

            foreach ($questParents as $key => $question2) {
                $repParent->setLabel($reponsesParent[random_int(0,sizeof($reponsesParent)-1)])
                ->setQuestion($question2)
                ->setUser($parent);
                $manager->persist($repParent);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [QuestionsFixtures::class, UserFixtures::class];
    }
}
