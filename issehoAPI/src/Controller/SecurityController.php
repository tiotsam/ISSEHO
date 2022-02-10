<?php

namespace App\Controller;

use App\Services\SecurityServices;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{

    private $logger;
    private $service;

    
    public function __construct(LoggerInterface $logger, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $manager, SecurityServices $service)
    {
        $this->logger = $logger;
        $this->userPasswordHasher = $userPasswordHasher;
        $this->EntityManagerInterface = $manager;
        $this->service = $service;
    }
    
    // #[Route('/security', name: 'security')]
    // public function index(): Response
    // {
    //     return $this->render('security/index.html.twig', [
    //         'controller_name' => 'SecurityController',
    //     ]);
    // }

    #[Route('/api/register', name: 'register',methods:['POST'])]
    public function index(Request $request): Response
    {
        try{
            $post = json_decode($request->getContent(),true);
            $this->service->register($post['email'],$post['prenom'],$post['nom'],$post['password'],$post['role'],$post['tel'],$post['rue'],$post['departement'],$post['ville'],$post['birthdate'],$post['dateInscription'],$post['img'],$post['parent']);
        }
        catch(Exception $e){
            return $this->json($e->getMessage(),500);
        }
        return $this->json('Utilisateur Enregistré');
        
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
