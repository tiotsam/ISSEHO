<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\Infos;
use App\Entity\MailAuto;
use App\Entity\User;
use App\Repository\CoursRepository;
use App\Repository\InfosRepository;
use App\Repository\UserRepository;
use DateInterval;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MailAutoFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(UserRepository $userRepository, CoursRepository $coursRepository, InfosRepository $infosRepository)
    {
        $this->userRepository = $userRepository;
        $this->coursRepository = $coursRepository;
        $this->infosRepository = $infosRepository;
    }
    
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $cours = new Cours;
        $cours = $this->coursRepository->findAll();
        $objet = array('Confirmation de la création d’une séance','Confirmation de l’inscription à une séance','Invitation à la visioconférence','Annulation d’une séance','Désinscription à une séance','Confirmation du rendez-vous');
        
        $admin = new User;
        $admin = $this->userRepository->findOneBy(array('email'=>'contact@isseho.com'));
        // var_dump($admin->getEmail());

        foreach ($cours as $key => $cour) {
            $mail = new MailAuto;
            $info = new Infos;
            $auteur = new User;
            $auteur = $cour->getAuteur();
            $participants = $cour->getParticipants();
            
            // $info = $this->infosRepository->findOneBy(array('user_id'=>$auteur->getId()));
            $info = $auteur->getInfos();
            
            $mail->setObjet($objet[0])
            ->setContenu("Bonjour".$info->getPrenom().",
            Isseho.com vous confirme la programmation de la séance de".$cour->getMatieres()->getNom()." niveau "
            .$cour->getNiveau()->getNom()."le ".$cour->getDateDebut()->format('d-m-Y')." à ".$cour->getDateDebut()->format('H:i:s')."
            Nous vous tiendrons informés des inscriptions à venir.
            Bien Cordialement.
            ISSEHO.COM")
            ->setDateEnvoi($cour->getDateDebut()->sub(new DateInterval('P2D')))
            ->setAuteur($auteur)
            ->setCours($cour);

            $invite = new MailAuto;
            $invite->setObjet($objet[2])
            ->setContenu("Bonjour à tous,
                        Isseho.com vous invite à assister à la visioconference à la séance ".$cour->getMatieres()->getNom()."
                        niveau ".$cour->getNiveau()->getNom()." le ".$cour->getDateDebut()->format('d-m-Y').", à ".$cour->getDateDebut()->format('H:i:s')." avec ".$info->getPrenom()." ".$info->getNom().".
                        Une dizaine de minutes avant, nous vous conseillons de tester votre
                        équipement (son de l’ordinateur/tablette, cadrage de la webcam afin d’être
                        prêts pour le début de la session.
                        Bien Cordialement.
                        ISSEHO.COM")
            ->setDateEnvoi($cour->getDateDebut()->sub(new DateInterval('P1D')))
            ->setAuteur($admin)
            ->setCours($cour);

            foreach ($participants as $participant) {
                $mail->addDestinataire($participant);
                $invite->addDestinataire($participant);

                $parent = new User;
                $infoParent = new Infos;
                $infoParent = $participant->getEnfants();
                // $parent = $this->userRepository->findOneBy(array('Infos_id' => $infoParent->getId() ));
                $parent = $infoParent->getUser();

                $infoParticipant = new Infos;
                // $infoParticipant = $this->infosRepository->findOneBy(array('user_Id' => $participant->getId() ));
                $infoParticipant = $participant->getInfos();

                $confirm = new MailAuto;
                $confirm->setObjet($objet[1])
                ->setContenu("Bonjour".$infoParent->getPrenom()." ".$infoParent->getNom().",
                Isseho.com vous confirme l’inscription de ".$infoParticipant->getPrenom()." à la séance de
                ".$cour->getMatieres()->getNom()." niveau ".$cour->getNiveau()->getNom()." le ".$cour->getDateDebut()->format('d-m-Y').", à ".$cour->getDateDebut()->format('H:i:s')."
                Vous recevrez un mail contenant le lien de la visioconférence 24h
                avant l'heure de la séance avec les instructions de connexion.
                Bien Cordialement.
                ISSEHO.COM")
                ->setDateEnvoi($cour->getDateDebut()->sub(new DateInterval('P'.random_int(1,2).'D')))
                ->setAuteur($parent)
                ->addDestinataire($auteur)
                ->setCours($cour);
                $manager->persist($confirm);
                
            }
            $manager->persist($mail);
            $manager->persist($invite);

            if( random_int(1,20) == 10 ){
                $annulation = new MailAuto;
                $annulation->setObjet($objet[3])
                    ->setContenu("Bonjour à tous,
                    J’ai le regret de vous informer que j’ai dû annuler la séance de ".$cour->getMatieres()->getNom()." niveau
                    ".$cour->getNiveau()->getNom()." le ".$cour->getDateDebut()->format('d-m-Y').", à ".$cour->getDateDebut()->format('H:i:s').".
                    Vous pouvez inscrire vos enfants à de nouvelles sessions
                    Bien cordialement
                    ".$cour->getAuteur()->getInfos()->getNom()." et ".$cour->getAuteur()->getInfos()->getPrenom()." du bénévole")
                    ->setDateEnvoi($cour->getDateDebut()->sub(new DateInterval('P'.random_int(1,2).'D')))
                    ->setAuteur($auteur)
                    ->setCours($cour);
                    foreach ( $cour->getParticipants() as $participant ) {
                        
                        $annulation->addDestinataire($participant);
                    }
                    $manager->persist($annulation);
            }

            if( random_int(1,20) == 10 ){
                $enfantAnnul = new User;
                $enfantAnnul = $cour->getParticipants()[random_int(0,sizeof($cour->getParticipants())-1)];
                $parentAnnul = new Infos;
                $parentAnnul = $enfantAnnul->getEnfants();
                $annulationP = new MailAuto;
                $annulationP->setObjet($objet[4])
                    ->setContenu("Bonjour ".$auteur->getInfos()->getPrenom()." ".$auteur->getInfos()->getNom()." 
                    J’ai le regret de vous informer que j’ai dû annuler l’inscription de ".$enfantAnnul->getInfos()->getPrenom()."
                     de la séance de ".$cour->getMatieres()->getNom()." niveau ".$cour->getNiveau()->getNom()."le ".$cour->getDateDebut()->format('d-m-Y').", à ".$cour->getDateDebut()->format('H:i:s').".
                    Bien cordialement
                    ".$parentAnnul->getPrenom()." ".$parentAnnul->getNom() )
                    ->setDateEnvoi($cour->getDateDebut()->sub(new DateInterval('P'.random_int(1,2).'D')))
                    ->setAuteur($parentAnnul->getUser())
                    ->setCours($cour)
                    ->addDestinataire($auteur);
                $manager->persist($annulationP);
            }

        }

        $rdv = new MailAuto;
        $rdv->setObjet($objet[5])
        ->setContenu("Bonjour Prénom et Nom du parent,
        Je vous confirme notre rendez-vous du DDD à HHH.
        Vous recevrez un mail contenant le lien de la visioconférence 24h
        avant l’heure la séance avec les instructions de connexion.
        Bien Cordialement.
        Nom et prénom du bénévole")
        ->setDateEnvoi(new \DateTime(random_int(1,12).'/'.random_int(1,28).'/2021'))
        ->setAuteur($auteur)
        ->setCours($cour);
        for ($i=0; $i < random_int(1,5); $i++) { 
            $destinataire = new User;
            $destinataire = $this->userRepository->findOneBy(array('email'=>'parent'.random_int(0,9).'@gmail.com'));
            $mail->addDestinataire($destinataire);
        }
        $manager->persist($rdv);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class , CoursFixtures::class , InfosFixtures::class];
    }
}
