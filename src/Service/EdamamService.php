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

    // Retourne toutes les données reçues depuis l'API
    return $response->toArray();
}
}