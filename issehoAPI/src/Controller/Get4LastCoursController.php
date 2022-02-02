<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Repository\CoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Get4LastCoursController extends AbstractController
{

    public function __construct(CoursRepository $coursRepository)
    {
        $this->coursRepository = $coursRepository;
    }
    
    // #[Route('/cours/home', name: 'get4_last_cours')]
    public function __invoke(): Response
    {
        // $cours = new Cours;
        $data = $this->coursRepository->findLastFour();
        var_dump('coucou');
        $data = $this->json(['cours'=> $data]);
        
        return $data;
    }
}
