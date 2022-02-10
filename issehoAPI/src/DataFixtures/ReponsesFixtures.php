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
            $prof = new User;
            $prof = $this->userRepository->findOneBy(['email' => 'prof'.$i.'@gmail.com']);
            
            
            foreach ($questProfs as $key => $question) {
                $repProf = new Reponses;
                if($key == 0){
                   $labelRep = $reponsesProf[random_int(0,2)];
                }
                if($key == 1){
                    $labelRep = $reponsesProf[random_int(3,6)];
                }
                if($key == 2){
                    $labelRep = $reponsesProf[random_int(7,9)];
                }
                $repProf->setLabel($labelRep)
                ->setQuestion($question)
                ->setUser($prof);
                $manager->persist($repProf);
            }

            $parent = new User;
            $parent = $this->userRepository->findOneBy(['email' => 'parent'.$i.'@gmail.com']);
            
            foreach ($questParents as $key2 => $quest) {
                $repParent = new Reponses;
                if($key2 == 0){
                    $labelRep2 = $reponsesParent[random_int(0,2)];
                 }
                 if($key2 == 1){
                     $labelRep2 = $reponsesParent[random_int(3,5)];
                 }
                 if($key2 == 2){
                     $labelRep2 = $reponsesParent[random_int(6,8)];
                 }
                $repParent->setLabel($labelRep2)
                ->setQuestion($quest)
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
