<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class EdamamService
{
    private string $appId;
    private string $apiKey;
    private HttpClientInterface $client;

    public function __construct(string $appId, string $apiKey, HttpClientInterface $client)
    {
        $this->appId = $appId;
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    public function getNutritionData(string $ingredient): array
    {
        $url = 'https://api.edamam.com/api/nutrition-data';
        $response = $this->client->request('GET', $url, [
            'query' => [
                'app_id' => $this->appId,
                'app_key' => $this->apiKey,
                'ingr' => $ingredient
            ]
        ]);

        $data = $response->toArray();

        // Vérifier si les clés existent
        $nutritionData = [
            'protein' => isset($data['totalNutrients']['PROCNT']) ? $data['totalNutrients']['PROCNT']['quantity'] : 0,
            'fat' => isset($data['totalNutrients']['FAT']) ? $data['totalNutrients']['FAT']['quantity'] : 0,
            'carbs' => isset($data['totalNutrients']['CHOCDF']) ? $data['totalNutrients']['CHOCDF']['quantity'] : 0,
        ];

        return $nutritionData;
    }
}