<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NovaPostService
{
    private string $novaPostApiKey;
    private string $novaPostApiUrl;

    public function __construct() {
        $this->novaPostApiKey = config('services.nova_post_api.api_key');
        $this->novaPostApiUrl = config('services.nova_post_api.url');
    }

    public function getCities(string $query = 'Авангард'): array
    {
        $response = Http::post($this->novaPostApiUrl, [
            'apiKey' => $this->novaPostApiKey,
            'modelName' => 'AddressGeneral',
            'calledMethod' => 'searchSettlements',
            'methodProperties' => [
                'CityName' => $query,
                'Limit' => '10',
                'Page' => '1'
            ]
        ]);

        $data = $response->json();
        $result = [];

        if ($data['success'] && $data['data'][0]['Addresses']) {
            $result = array_reduce($data['data'][0]['Addresses'], function ($carry, $item) {
                $carry[] = $item['Present'];

                return $carry;
            }, []);
        }

        return $result;
    }
}
