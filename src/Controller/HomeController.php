<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Formation;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) 
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $repository = $this->entityManager->getRepository(Formation::class);
        $formations = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'formation' => $formations,
        ]);
    }
}
