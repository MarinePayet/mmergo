<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AmenagementController extends AbstractController{
    #[Route('/amenagement', name: 'app_amenagement')]
    public function index(): Response
    {
        return $this->render('amenagement/index.html.twig', [
            'controller_name' => 'AmenagementController',
        ]);
    }
}
