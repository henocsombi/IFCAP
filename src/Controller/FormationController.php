<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Formation;
use Doctrine\ORM\EntityManagerInterface;

class FormationController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) 
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/formation', name: 'formation')]
    public function index(Request $request): Response
    {
        return $this->render('formation/index.html.twig');
    }

    #[Route('/formation/{slug}', name: 'formation.show')]
    public function show(Request $request, string $slug): Response
    {
        $repository = $this->entityManager->getRepository(Formation::class);
        $formations = $repository->findAll();

        return $this->render('formation/show.html.twig', [
            'slug' => $slug,
            'formation' => $formations,
        ]);
    }
    // public function index(): Response
    // {
    //     return $this->render('formation_page/index.html.twig', [
    //         'controller_name' => 'FormationPageController',
    //     ]);
    // }
}
