<?php

namespace App\Controller;

use App\Entity\Cours;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoursController extends AbstractController
{
    #[Route('/cours', name: 'cours')]
    public function index(): Response
    {
        return $this->render('cours/index.html.twig', [
            'controller_name' => 'CoursController',
        ]);
    }

    #[Route('/cours/author/{authorId}', name: 'cours.list.Auteur')]
    public function coursByAuthor(ManagerRegistry $doctrine, $authorId): Response
    {
        $repository = $doctrine->getRepository(Cours::class);
        $cours = $repository->findByProfId($authorId);
        return $this->json(['cours'=> $cours]);
    }

    #[Route('/cours/author/{authorName}', name: 'cours.list.nomAuteur')]
    public function coursByAuthorName(ManagerRegistry $doctrine, $authorName): Response
    {
        $repository = $doctrine->getRepository(Cours::class);
        $cours = $repository->findByProfName($authorName);
        return $this->json(['cours'=> $cours]);
    }


    #[Route('/cours/countCours', name: 'cours.count')]
    public function getEnfantNumber(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Cours::class);
        $cours = $repository->countCours();
        return $this->json(['user'=> $cours]);
    }

    #[Route('/cours/home', name: 'cours.list.4')]
    public function getLastFour(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Cours::class);
        $cours = $repository->findLastFour();
        return $this->json(['user'=> $cours]);
    }

}
