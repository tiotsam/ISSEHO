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

        
        $matières = array('Mathématiques','Français','Echec','Anglais','Informatique','Physique','Chimie');
        $niveaux = array('CP','CE1','CE2','CM1','CM2','6ème','5ème','4ème','3ème','2nde','1ère','terminale','BEP','CAP','BAC PRO');
        
        for($i=0 ; $i < 30; $i++){
            $cour = new Cours;
            $mat = new Matieres;
            $level = new Niveau;
            $auteur = new User;
            $maxParticipants = random_int(1,5);
        
            $mat = $this->matieresRepository->findOneBy(array('nom'=>$matières[random_int(0,sizeof($matières)-1)]));
            $level = $this->niveauRepository->findOneBy(array('nom'=>$niveaux[random_int(0,sizeof($niveaux)-1)]));
            $auteur = $this->userRepository->findOneBy(array('email'=>'prof'.random_int(0,9).'@gmail.com'));
            
            $dateD = new \DateTime(random_int(1,12).'/'.random_int(1,28).'/2021');
            $cour->setDateDebut($dateD)
            ->setDateFin($dateD->add(new DateInterval('PT2H')))
            ->setAuteur($auteur)
            ->setMatieres($mat)
            ->setMaxParticipants($maxParticipants)
            ->setNiveau($level);
            for ($j=0; $j < random_int(1,$maxParticipants); $j++) {
                $eleve = new User;
                $eleve = $this->userRepository->findOneBy(array('email'=>'enfant'.random_int(0,9).'@gmail.com'));
                $cour->addParticipant($eleve);
            }
            $manager->persist($cour);
            // var_dump("cour".$i."enregistré !");
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class,InfosFixtures::class,MatièresFixtures::class,NiveauFixtures::class];
    }
}
