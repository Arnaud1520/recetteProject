<?php

namespace App\Controller;

use App\Service\EdamamService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NutritionInfoController extends AbstractController
{
    private $edamamService;

    public function __construct(EdamamService $edamamService)
    {
        $this->edamamService = $edamamService;
    }

    #[Route('/nutrition_info', name: 'nutrition_data')]
    public function showNutritionData(Request $request): Response
    {
        // Récupérer l'ingrédient passé en paramètre de requête (ou définir une valeur par défaut)
        $ingredient = $request->query->get('ingredient', '1 apple'); // Si aucun ingrédient, on prend "1 apple" par défaut

        // Récupérer les données nutritionnelles de l'API
        $nutritionData = $this->edamamService->getNutritionData($ingredient);

        // Afficher les données pour déboguer (optionnel)
        dump($nutritionData); // Vous pouvez voir la structure dans la console Symfony

        // Rendre la vue avec les données nutritionnelles
        return $this->render('nutrition_info/show.html.twig', [
            'ingredient' => $ingredient,
            'nutritionData' => $nutritionData['totalNutrients'] ?? [], // On accède aux données dans "totalNutrients"
        ]);
    }
}

