<?php

namespace App\Controller;

use App\Entity\Message;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessagesController extends AbstractController
{
    #[Route('/messages', name: 'messages')]
    public function index(): Response
    {
        return $this->render('messages/index.html.twig', [
            'controller_name' => 'MessagesController',
        ]);
    }

    #[Route('/messages/user/{userId}', name: 'messages.list.user')]
    public function messagesByUser(ManagerRegistry $doctrine, $userId): Response
    {
        $repository = $doctrine->getRepository(Message::class);
        $messages = $repository->findByUserId($userId);
        return $this->json(['messages'=> $messages]);
    }
}
