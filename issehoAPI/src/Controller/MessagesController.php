<?php

namespace App\Controller;

use App\Entity\Message;
use App\Repository\MessageRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessagesController extends AbstractController
{
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    #[Route('/messages', name: 'messages')]
    public function index(): Response
    {
        return $this->render('messages/index.html.twig', [
            'controller_name' => 'MessagesController',
        ]);
    }

    #[Route('/messages/user/{userId}', name: 'messages.list.user')]
    public function messagesByUser($userId): Response
    {
        // $repository = $doctrine->getRepository(Message::class);
        // $msgs = $repository->findByUserId($userId);
        $msgs = new Message;
        $msgs = $this->messageRepository->findByUserId($userId);

        return $this->json(['messages'=> $msgs]);
    }
}
