<?php

namespace App\DataFixtures;

use App\Entity\Infos;
use App\Entity\StatistiquesConnexions;
use App\Entity\User;
use App\Repository\UserRepository;
use DateInterval;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StatsFixtures extends Fixture implements DependentFixtureInterface
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
        
        foreach ( $users as $user ) {

            if( $user->getEmail() !== 'contact@isseho.com'){
                
                for ($i=0; $i < 20; $i++) {
                    
                    $dco = $user->getInfos()->getDateInscription()->add(new DateInterval('P'.random_int(1,100).'D'));
                    $ddeco = $dco->add(new DateInterval('PT'.random_int(1,3).'H')); 

                    $stats = new StatistiquesConnexions;
                    $stats->setDateConnexion($dco)
                    ->setDateDeconnexion($ddeco)
                    ->setUser($user);
                    $manager->persist($stats);
                }

            }else{

                for ($j=0; $j < 100 ; $j++) { 

                    $dateCo = new \DateTime(random_int(1,12).'/'.random_int(1,28).'/2021');
                    $dateDeco = $dateCo->add(new DateInterval('PT'.random_int(1,3).'H'));

                    $stats = new StatistiquesConnexions;
                    $stats->setDateConnexion($dateCo)
                    ->setDateDeconnexion($dateDeco)
                    ->setUser($user);
                    $manager->persist($stats);
                }
            }      
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class , InfosFixtures::class];
    }
}
