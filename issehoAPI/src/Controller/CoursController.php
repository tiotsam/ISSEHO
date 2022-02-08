<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Repository\CoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class CoursController extends AbstractController
{

    public function __construct(CoursRepository $coursRepository)
    {
        $this->coursRepository = $coursRepository;
    }

    public function __invoke(Cours $data): Response
    {
        $data = new Cours;
        $data = $this->getLastFour();

        return $data;
    }

    #[Route('/cours', name: 'cours')]
    public function index(): Response
    {
        return $this->render('cours/index.html.twig', [
            'controller_name' => 'CoursController',
        ]);
    }

    #[Route('/cours/author/{authorId}', name: 'cours.list.Auteur')]
    public function coursByAuthorId( $authorId): Response
    {
        $cours = new Cours;
        $cours = $this->coursRepository->findByProfId($authorId);
        $cours = $this->json(['cours'=> $cours]);
        return $cours;
    }

    #[Route('/cours/author/{authorName}', name: 'cours.list.nomAuteur')]
    public function coursByAuthorName( $authorName): Response
    {

        $cours = new Cours;
        $cours = $this->coursRepository->findByProfName($authorName);
        $cours = $this->json(['cours'=> $cours]);
        return $cours;
    }


    #[Route('/cours/countCours', name: 'cours.count')]
    public function getCountCours(): Response
    {
        $cours = new Cours;
        $cours = $this->coursRepository->countCours();
        $cours = $this->json(['cours'=> $cours]);
        return $cours;
    }

    #[Route('/cours/home', name: 'cours.list.4')]
    public function getLastFour(): Response
    {
        $cours = new Cours;
        $cours = $this->coursRepository->findLastFour();
        $cours = $this->json(['cours'=> $cours]);
        // $jsonContent = $serializer->serialize($cours, 'json');
        
        return $cours;
    }

}
