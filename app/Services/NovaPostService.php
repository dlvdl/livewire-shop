<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NovaPostService
{
    private string $novaPostApiKey;

    private string $novaPostApiUrl;

    public function __construct()
    {
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
                'Page' => '1',
            ],
        ]);

        $data = $response->json();
        $result = [];

        if ($data['success'] && $data['data'][0]['Addresses']) {
            $result = array_reduce($data['data'][0]['Addresses'], function ($carry, $item) {
                $result = [];
                $result['name'] = $item['Present'];
                $result['ref'] = $item['DeliveryCity'];
                $result['mainDescription'] = $item['MainDescription'];
                $carry[] = $result;

                return $carry;
            }, []);
        }

        return $result;
    }

    public function getDepartmentsByRef(string $query, string $ref)
    {
        $response = Http::post($this->novaPostApiUrl, [
            'apiKey' => $this->novaPostApiKey,
            'modelName' => 'AddressGeneral',
            'calledMethod' => 'getWarehouses',
            'methodProperties' => [
                'CityRef' => $ref,
                'Language' => 'UA',
            ],
        ]);

        $data = $response->json();
        $result = [];

        if ($data['success'] && $data['data']) {
            $result = array_reduce($data['data'], function ($carry, $item) {
                $result = [];
                $result['name'] = $item['Description'];
                $result['number'] = $item['Number'];
                $result['ref'] = $item['Ref'];
                $carry[] = $result;

                return $carry;
            }, []);
        }

        return $result;
    }

    public function getDepartmentsByString(string $query, $cityName)
    {
        $response = Http::post($this->novaPostApiUrl, [
            'apiKey' => $this->novaPostApiKey,
            'modelName' => 'AddressGeneral',
            'calledMethod' => 'getWarehouses',
            'methodProperties' => [
                'CityName' => $cityName,
                'FindByString' => $query,
                'Language' => 'UA',
            ],
        ]);

        $data = $response->json();
        $result = [];

        if ($data['success'] && $data['data']) {
            $result = array_reduce($data['data'], function ($carry, $item) {
                $result = [];
                $result['name'] = $item['Description'];
                $result['number'] = $item['Number'];
                $result['ref'] = $item['Ref'];
                $carry[] = $result;

                return $carry;
            }, []);
        }

        return $result;
    }
}
