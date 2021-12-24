<?php


namespace App\Services;

use App\Entity\Infos;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityServices {

    public function __construct( UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $manager,UserRepository $userRep)
    {
        $this->userPasswordHasher = $userPasswordHasher;
        $this->manager = $manager;
        $this->userRep = $userRep;
    }

    public function register( $email , $prenom , $nom , $pass , $role , $departement , $ville , $birthdate , $dateInscription , $img = NULL , $parent = NULL)
    {

        $user = new User;
        $info = new Infos;

        if(empty($email)){
            throw new Exception("L'email doit être renseigné");
        }
        
        if(empty($prenom)){
            throw new Exception("Le prénom doit être renseigné");
        }

        if(empty($nom)){
            throw new Exception("Le nom doit être renseigné");
        }

        if(empty($pass)){
            throw new Exception("Le mot de passe doit être renseigné");
        }


        if(empty($role)){
            throw new Exception("Le rôle doit être renseigné");
        }


        if(empty($img)){
            $img = 'https://jfim.org/wp-content/uploads/2016/11/portrait-anonyme.png';
        }

        if(empty($departement)){
            throw new Exception("Le département doit être renseigné");
        }

        if(empty($ville)){
            throw new Exception("La ville doit être renseignée");
        }

        if(empty($birthdate)){
            throw new Exception("La date de naissance doit être renseignée");
        }
        else{
            if( is_string($birthdate) ){
                $birthdate = new \DateTime($birthdate);
            }
        }

        if(empty($dateInscription)){
            throw new Exception("La date d'inscription doit être renseignée");
        }
        else{
            if( is_string($dateInscription) ){
                $dateInscription = new \DateTime($dateInscription);
            }
        }


        if( filter_var($email, FILTER_VALIDATE_EMAIL ))
        {
            
            if($this->userRep->findOneBy(['email' => $email]))
            {
                throw new Exception("L'adresse mail : ".$email.' existe déjà'); 
            }
            else
            {
                $user->setEmail($email);
                $user->setPassword($this->userPasswordHasher->hashPassword($user,plainPassword:$pass));
                switch ($role) {
                    case 'parent':
                        $user->setRoles(['ROLE_USER','ROLE_PARENT']);
                        break;

                    case 'enfant':
                        $user->setRoles(['ROLE_USER','ROLE_ENFANT']);
                        break;

                    case 'prof':
                        $user->setRoles(['ROLE_USER','ROLE_PROF']);
                        break;
    
                    default:
                        $user->setRoles(['ROLE_USER']);
                        break;
                }

                $info->setPrenom($prenom)
                ->setNom($nom)
                ->setDepartement($departement)
                ->setVille($ville)
                ->setBirthDate($birthdate)
                ->setDateInscription($dateInscription)
                ->setUser($user)
                ->setImageUser($img);

                if(!empty($parent)){
                    $p = new User;
                    $p = $this->userRep->findOneBy(['email' => $parent]);
                    
                    $infoParent = new Infos;
                    $infoParent = $p->getInfos();
                    $infoParent->addEnfant($user);
                    $this->manager->persist($infoParent);
                }
                
                $user->setInfos($info);

                $this->manager->persist($user);
                $this->manager->persist($info);
                $this->manager->flush();
            }
        }
        else
        {
            throw new Exception('Veuillez entrer une adresse mail valide.');
        }
    }
}