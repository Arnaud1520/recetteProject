<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NutritionInfoController extends AbstractController
{
    #[Route('/nutrition/info', name: 'app_nutrition_info')]
    public function index(): Response
    {
        return $this->render('nutrition_info/index.html.twig', [
            'controller_name' => 'NutritionInfoController',
        ]);
    }
}
