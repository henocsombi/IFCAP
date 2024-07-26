<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormationPageController extends AbstractController
{
    #[Route('/formation/page', name: 'app_formation_page')]
    public function index(): Response
    {
        return $this->render('formation_page/index.html.twig', [
            'controller_name' => 'FormationPageController',
        ]);
    }
}
