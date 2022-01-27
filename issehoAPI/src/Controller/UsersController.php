<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'users')]
    public function index(): Response
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }

    #[Route('/users/children/{idParent}', name: 'users.list.Auteur')]
    public function coursByAuthor(ManagerRegistry $doctrine, $idParent): Response
    {
        $repository = $doctrine->getRepository(User::class);
        $users = $repository->findChildren($idParent);
        return $this->json(['users'=> $users]);
    }

    #[Route('/users/prof', name: 'users.list.prof')]
    public function getProf(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(User::class);
        $users = $repository->findByRoleProf();
        return $this->json(['user'=> $users]);
    }

    #[Route('/users/countProf', name: 'users.count.prof')]
    public function getProfNumber(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(User::class);
        $users = $repository->countProf();
        return $this->json(['user'=> $users]);
    }

    #[Route('/users/parent', name: 'users.list.parent')]
    public function getParent(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(User::class);
        $users = $repository->findByRoleParent();
        return $this->json(['user'=> $users]);
    }

    #[Route('/users/countParent', name: 'users.count.parent')]
    public function getParentNumber(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(User::class);
        $users = $repository->countParent();
        return $this->json(['user'=> $users]);
    }

    #[Route('/users/enfant', name: 'users.list.enfant')]
    public function getEnfant(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(User::class);
        $users = $repository->findByRoleEnfant();
        return $this->json(['user'=> $users]);
    }

    #[Route('/users/countEnfant', name: 'users.count.enfant')]
    public function getEnfantNumber(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(User::class);
        $users = $repository->countEnfant();
        return $this->json(['user'=> $users]);
    }

}
