<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ErgotherapyController extends AbstractController{
    #[Route('/ergotherapy', name: 'app_ergotherapy')]
    public function index(): Response
    {
        return $this->render('ergotherapy/index.html.twig', [
            'controller_name' => 'ErgotherapyController',
        ]);
    }
}
