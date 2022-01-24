<?php

namespace App\DataFixtures;

use ApiPlatform\Core\OpenApi\Model\Info;
use App\Entity\Infos;
use App\Entity\User;
use App\Repository\InfosRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InfosFixtures extends Fixture implements DependentFixtureInterface
{

    public function __construct(UserRepository $userRepository, InfosRepository $infosRepository)
    {

        $this->userRepository = $userRepository;
        $this->infoRepository = $infosRepository;
    }


    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $nom = array('martin', 'bernard', 'thomas', 'petit', 'robert', 'richard', 'durand', 'dubois', 'moreau', 'laurent', 'simon', 'michel', 'lefevre', 'leroy', 'roux', 'david', 'morel', 'bertrand', 'fournier', 'girard');
        $prenom = array('emma', 'liam', 'alice', 'sophia', 'nathan', 'Florence', 'william', 'Logan', 'charlie', 'léo', 'olivia', 'thomas', 'mia', 'amélia', 'félix', 'noah', 'léa', 'jacob', 'édouard', 'charlotte');
        $ville = array('abilly', 'paris', 'marseille', 'lyon', 'toulouse', 'nice', 'rennes', 'reims', 'toulon', 'saint-étienne', 'le havre', 'grenoble', 'dijon', 'angers', 'villeurbanne', 'Saint-denis');
        $imageuser = array('https://us.123rf.com/450wm/kritchanut/kritchanut1401/kritchanut140100054/25251050-photo-de-profil-d-affaires-de-l-avatar.jpg?ver=6');
        $imageenfant = array('https://us.123rf.com/450wm/kritchanut/kritchanut1401/kritchanut140100054/25251050-photo-de-profil-d-affaires-de-l-avatar.jpg?ver=6');
        $typeRue = array('rue','boulevard','avenue');
        $nomRue = array('général de Gaulle','Clémenceau','de Paris','Léon Blum','de Brest','de Reims','de Laon','Léonard de Vinci');

        for ($i = 0; $i < 10; $i++) {


            $user = new User;
            $info = new Infos;
            $user = $this->userRepository->findOneBy(array("email" => 'prof'.$i.'@gmail.com'));
            $birthdate = new \DateTime(random_int(1, 12) . '/' . random_int(1, 28) . '/' . random_int(1960, 2000));
            $dateinscription = new \DateTime('12/' . random_int(1, 28) . '/2020');
            $info->setNom($nom[random_int(0, sizeof($nom) - 1)])
                ->setPrenom($prenom[random_int(0, sizeof($prenom) - 1)])
                ->setDepartement(random_int(1, 95))
                ->setVille($ville[random_int(0, sizeof($ville) - 1)])
                ->setRue(random_int(1,300).' '.$typeRue[random_int(0,sizeof($typeRue) - 1)].' '.$nomRue[random_int(0,sizeof($nomRue)-1)])
                ->setBirthDate($birthdate)
                ->setImageUser($imageuser[random_int(0, sizeof($imageuser) - 1)])
                ->setDateInscription($dateinscription)
                ->setUser($user);



            $manager->persist($info);
            $user->setInfos($info);
            $manager->persist($user);
        }

        for ($i = 0; $i < 10; $i++) {


            $user = new User;
            $info = new Infos;
            $enfant = new User;
            $enfant = $this->userRepository->findOneBy(array("email" => 'enfant'.$i.'@gmail.com'));
            $user = $this->userRepository->findOneBy(array("email" => 'parent'.$i.'@gmail.com'));
            $birthdate = new \DateTime(random_int(1, 12) . '/' . random_int(1, 28) . '/' . random_int(1960, 2000));
            $dateinscription = new \DateTime('12/' . random_int(1, 28) . '/2020');
            $info->setNom($nom[random_int(0, sizeof($nom) - 1)])
                ->setPrenom($prenom[random_int(0, sizeof($prenom) - 1)])
                ->setDepartement(random_int(1, 95))
                ->setVille($ville[random_int(0, sizeof($ville) - 1)])
                ->setRue(random_int(1,300).' '.$typeRue[random_int(0,sizeof($typeRue) - 1)].' '.$nomRue[random_int(0,sizeof($nomRue)-1)])
                ->setBirthDate($birthdate)
                ->setImageUser($imageuser[random_int(0, sizeof($imageuser) - 1)])
                ->setDateInscription($dateinscription)
                ->addEnfant($enfant)
                ->setUser($user);





            $manager->persist($info);
            $user->setInfos($info);
            $manager->persist($user);
        }



        for ($i = 0; $i < 10; $i++) {


            $user = new User;
            $info = new Infos;
            $user = $this->userRepository->findOneBy(array("email" => 'enfant'.$i.'@gmail.com'));
            $birthdate = new \DateTime(random_int(1, 12) . '/' . random_int(1, 28) . '/' . random_int(2005, 2015));
            $dateinscription = new \DateTime('12/' . random_int(1, 28) . '/2020');
            $info->setNom($nom[random_int(0, sizeof($nom) - 1)])
                ->setPrenom($prenom[random_int(0, sizeof($prenom) - 1)])
                ->setDepartement(random_int(1, 95))
                ->setVille($ville[random_int(0, sizeof($ville) - 1)])
                ->setRue(random_int(1,300).' '.$typeRue[random_int(0,sizeof($typeRue) - 1)].' '.$nomRue[random_int(0,sizeof($nomRue)-1)])
                ->setBirthDate($birthdate)
                ->setImageUser($imageenfant[random_int(0, sizeof($imageenfant) - 1)])
                ->setDateInscription($dateinscription)
                ->setUser($user);



            $manager->persist($info);
            $user->setInfos($info);
            $manager->persist($user);
        }




        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class];
    }
}
