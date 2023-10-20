<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Arr;

class NpiApiService
{
    private $client;
    private static $baseUri = 'https://npiregistry.cms.hhs.gov/api/';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::$baseUri,
        ]);
    }

    public function searchProviders(array $filters): array
    {
        if (strlen($filters['firstName']) > 2) {
            $filters['firstName'] = "*{$filters['firstName']}*";
        }

        if (strlen($filters['lastName']) > 2) {
            $filters['lastName'] = "*{$filters['lastName']}*";
        }

        $params = [
            'query' => [
                'version' => '2.1',
                'first_name' => $filters['firstName'],
                'last_name' => $filters['lastName'],
                // Add other query parameters here
            ]
        ];

        try {
            $response = $this->client->request('GET', '', $params);
            $responseData = json_decode($response->getBody(), true);

            if (!Arr::has($responseData, 'result_count') || Arr::get($responseData, 'result_count') === 0) {
                // 'result_count' is not set or its value is 0
                return [];
            } else {
                // 'result_count' is set and its value is not 0
                return Arr::get($responseData, 'results', []); // return 'results' if set; otherwise, return an empty array
            }
        } catch (GuzzleException $e) {
            // Handle exception or return a default failure status
            return [
                'status' => 'failure',
                'message' => 'Failed to fetch data from NPI Registry',
                'error' => $e->getMessage(),
            ];
        }
    }
}
