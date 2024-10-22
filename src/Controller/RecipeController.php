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
        $ingredient = '1 tomato'; // Exemple d'ingrédient
        $nutritionData = $this->edamamService->getNutritionData($ingredient);

        dump($nutritionData); // Ajoutez ceci pour voir la structure dans la console Symfony
        return $this->render('recipe/nutrition.html.twig', [
            'ingredient' => $ingredient,   // Passez l'ingrédient à la vue
            'nutritionData' => $nutritionData,
        ]);
    }

}
