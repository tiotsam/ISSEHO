<?php

namespace App\DataFixtures;

use App\Entity\Questionnaire;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestionnaireFixture extends Fixture implements DependentFixtureInterface
{
    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $questionsProf = array('Quelle a été votre motivation pour devenir enseignant ?','Où enseignez-vous habituellement ?',"Comment avez-vous connu ISSEHO.com ?");
        $reponsesProf = array("J'adore transmettre mon savoir à ceux qui en ont besoin.","Il faut bien manger.","J'adore les enfants.",'Ecole','Collège','Lycée','Université','Bouche à oreilles','recherche sur internet','la réponse D');

        $questionParent = array('Comment avez-vous connu ISSEHO.com ?','Pourquoi avoir fait des enfants ?', 'Quelle aide recherchez vous ?');
        $reponsesParent = array('Bouche à oreilles.','Recherche sur internet','vu à la télé',"J'ai toujours aimé les enfants.","Besoin de main d'oeuvre","Pas fait exprès","Mon enfant a du mal à suivre à l'école, il a besoin d'aide","Mon enfant s'en sort mais veut s'améliorer","Aider moi mon gosse est nul !");

        for ($i=0; $i < 10 ; $i++) { 
            
            $prof = new User;
            $prof = $this->userRepository->findOneBy(array("email" => 'prof'.$i.'@gmail.com'));
            $questions = new Questionnaire;
            $questions->setQuestions($questionsProf)
            ->setReponses(array($reponsesProf[random_int(0,2)] , $reponsesProf[random_int(3,6)] , $reponsesProf[random_int(7,9)]))
            ->addUser($prof);
            $manager->persist($questions);

            $parent = new User;
            $parent = $this->userRepository->findOneBy(array("email" => 'parent'.$i.'@gmail.com'));
            $questionsP = new Questionnaire;
            $questionsP->setQuestions($questionParent)
            ->setReponses(array( $reponsesParent[random_int(0,2)] , $reponsesParent[random_int(3,5)] , $reponsesParent[random_int(6,8)] ))
            ->addUser($parent);
            $manager->persist($questionsP);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class];
    }
}
