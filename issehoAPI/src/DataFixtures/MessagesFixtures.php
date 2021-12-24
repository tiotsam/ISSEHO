<?php

namespace App\DataFixtures;

use App\Entity\Message;
use App\Entity\User;
use App\Repository\UserRepository;
use DateInterval;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MessagesFixtures extends Fixture implements DependentFixtureInterface
{
    
    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $users = new User;
        $users = $this->userRepository->findAll();


        $objet = array('Avis sur le cour','Demande de rendez-vous','Envoi Devoirs','Nouvelles');
        $contenu = array("Qu'avez vous penser du cours ?","J'aimerais discuter avec vous des progres de mon enfant","J'ai appris que tu étais malade, est-ce que tu vas mieux ?","Merci de faire les exercices suivant pour le prochain cours.");

        foreach ($users as $user) {

            if( $user->getEmail() !== 'contact@isseho.com'){
                $msg = new Message;
                $prefix = array('prof','parent','enfant');
                $destinataire = $this->userRepository->findOneBy(array("email" => $prefix[random_int(0,2)].random_int(0,9).'@gmail.com'));
                
                $dateEnv = $user->getInfos()->getDateInscription()->add(new DateInterval('P'.random_int(1,100).'2D'));
    
                $msg->setObjet($objet[random_int(0 , sizeof($objet)-1)])
                    ->setContenu($contenu[random_int(0 , sizeof($contenu)-1)])
                    ->setAuteur($user)
                    ->setDateEnvoi($dateEnv)
                    ->addDestinataire($destinataire);
                $manager->persist($msg);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class , InfosFixtures::class];
    }
}
