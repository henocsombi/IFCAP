<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Formation;
use App\Entity\Session;
use Doctrine\ORM\EntityManagerInterface;

class FormationController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) 
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/formation/{slug}', name: 'formation.show')]
    public function show(Request $request, string $slug): Response
    {
        $repository = $this->entityManager->getRepository(Formation::class);
        $formations = $repository->findAll();

        $repository = $this->entityManager->getRepository(Session::class);
        $sessions = $repository->findAll();

        return $this->render('formation/show.html.twig', [
            'slug' => $slug,
            'formation' => $formations,
            'session' => $sessions,
        ]);
    }
}
