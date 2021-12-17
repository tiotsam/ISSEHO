<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\Matieres;
use App\Entity\Niveau;
use App\Entity\User;
use App\Repository\MatieresRepository;
use App\Repository\NiveauRepository;
use App\Repository\UserRepository;
use DateInterval;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CoursFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(UserRepository $userRepository, NiveauRepository $niveauRepository, MatieresRepository $matieresRepository)
    {
        $this->userRepository = $userRepository;
        $this->niveauRepository = $niveauRepository;
        $this->matieresRepository = $matieresRepository;
    }
    
    public function load(ObjectManager $manager): void
    {
        // // $product = new Product();
        // // $manager->persist($product);

        // for($i=0 ; $i < 30; $i++){
        //     $cour = new Cours;
        //     $auteur = new User;
        //     $mat = new Matieres;
        //     $level = new Niveau;
        //     $mat = $this->matieresRepository->findOneBy(array('id'=>random_int(1,7)));
        //     $level = $this->niveauRepository->findOneBy(array('id'=>random_int(1,15)));
        //     $auteur = $this->userRepository->findOneBy(array('email'=>'prof'.random_int(0,9).'@gmail.com'));
        //     $dateD = new \DateTime(random_int(1,12).'/'.random_int(1,28).'/2021');
        //     $cour->setDateDebut($dateD)
        //     ->setDateFin($dateD->add(new DateInterval('PT2H')))
        //     ->setAuteur($auteur)
        //     ->setMatieres($mat)
        //     ->setNiveau($level);
        //     for ($i=0; $i < random_int(1,5); $i++) {
        //         $eleve = new User;
        //         $eleve = $this->userRepository->findOneBy(array('email'=>'enfant'.random_int(0,9).'@gmail.com'));
        //         $cour->addParticipant($eleve);
        //     }
        //     $manager->persist($cour);
        // }


        // $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class , MatièresFixtures::class , NiveauFixtures::class];
    }
}
