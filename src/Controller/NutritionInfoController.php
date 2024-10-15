<?php

namespace App\Controller;

use App\Service\EdamamService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NutritionInfoController extends AbstractController
{
    private $edamamService;

    public function __construct(EdamamService $edamamService)
    {
        $this->edamamService = $edamamService;
    }

    #[Route('/nutrition_info/{ingredient}', name: 'nutrition_data')]
    public function showNutritionData(string $ingredient): Response
    {
        // Récupérez les données nutritionnelles de l'API
        $nutritionData = $this->edamamService->getNutritionData($ingredient);

        // Inspectez la réponse JSON
    //dd($nutritionData);  // Cela affichera le contenu de $nutritionData et arrêtera l'exécution

        // Passez les données à votre template
        return $this->render('nutrition_info/show.html.twig', [
            'nutritionData' => $nutritionData,
        ]);
    }
}
