<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AboutMeController extends AbstractController{
    #[Route('/', name: 'app_home')]
    #[Route('/about_me', name: 'app_about_me')]
    public function index(): Response
    {
        return $this->render('about_me/index.html.twig', [
            'controller_name' => 'AboutMeController',
        ]);
    }
}
