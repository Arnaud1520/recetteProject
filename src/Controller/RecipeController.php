<?php

namespace App\Controller;

use App\Service\EdamamService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    private EdamamService $edamamService;

    public function __construct(EdamamService $edamamService)
    {
        $this->edamamService = $edamamService;
    }

    #[Route('/recipe/nutrition', name: 'recipe_nutrition')]
    public function nutrition(): Response
    {
        $ingredient = '2 apples'; // Exemple d'ingrédient
        $nutritionData = $this->edamamService->getNutritionData($ingredient);

        return $this->render('recipe/nutrition.html.twig', [
            'nutritionData' => $nutritionData,
        ]);
    }
}
