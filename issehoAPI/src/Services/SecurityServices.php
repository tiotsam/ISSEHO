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

    public function register( $email , $prenom , $nom , $pass , $role , $tel , $rue , $departement , $ville , $birthdate , $dateInscription , $img = NULL , $parent = NULL)
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
        }else if( strlen($pass) < 6){
            throw new Exception("Le mot de passe doit avoir au moins 6 caractères");
        }


        if(empty($role)){
            throw new Exception("Le rôle doit être renseigné");
        }

        if(empty($tel)){
            throw new Exception("Le numéro de téléphone doit être renseigné");
        }else{
            if(strlen($tel) !== 14){
                throw new Exception("Numéro de téléphone non valide");
            }else{
                for ($i=0; $i < strlen($tel) ; $i++) { 
                    if( $i !== 2 && $i !== 5 && $i !== 8 && $i !== 11 ){

                        if(!is_numeric($tel[$i])){
                            throw new Exception("Numéro de téléphone non valide, le caractère ".$tel[$i]." à i = ".$i." n'est pas un entier");
                        }
                    }else{
                        $tel[$i] = '.';
                    }
                }
            }
        }


        if(empty($img)){
            $img = 'https://jfim.org/wp-content/uploads/2016/11/portrait-anonyme.png';
        }
        
        if(empty($rue)){
            throw new Exception("La rue doit être renseignée");
        }

        if(empty($departement)){
            throw new Exception("Le département doit être renseigné");
        }else{

            if ( strlen($departement)  === 2 || strlen($departement) === 3) {
                if ( !is_numeric($departement)) {
                    if ($departement !== '2A' && $departement !== '2a' && $departement !== '2B' && $departement !== '2b') {
                        throw new Exception('Le département doit être un nombre');
                    }
                } else if ( $departement < 0 || $departement > 95 || $departement == 20) {
                    if ( $departement < 971 || $departement > 974 && $departement != 976) {
    
                        throw new Exception('Merci de renseigner un numéro de département valide');
    
                    }
                }
            } else {
                throw new Exception('Un département doit être entre 2 et 3 caractères.');
            }
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
                $dateInscription = new \DateTime();
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
                        $user->setRoles(['ROLE_ADMIN']);
                        break;
                }
                $info->setPrenom($prenom)
                ->setNom($nom)
                ->setTel($tel)
                ->setDepartement($departement)
                ->setRue($rue)
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