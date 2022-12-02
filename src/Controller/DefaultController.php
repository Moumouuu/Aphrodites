<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $em): Response
    {
        $messages = $em
            ->getRepository(Message::class)
            ->findBy([], ['date_post' => 'ASC']);


        return $this->render('default/index.html.twig', [
            'messages' => $messages,
        ]);
    }

    #[Route('/info', name: 'info')]
    public function info(): Response
    {
        return $this->render('default/info.html.twig', []);
    }
}
