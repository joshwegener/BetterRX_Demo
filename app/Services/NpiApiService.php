<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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

    public function searchProviders(array $filters)
    {
        // Validate first_name
        if (empty($filters['firstName']) || strlen($filters['firstName']) < 2) {
            return [
                'status' => 'failure',
                'message' => 'The first name must be at least 2 characters long',
            ];
        }

        $params = [
            'query' => [
                'version' => '2.1',
                'first_name' => "*{$filters['firstName']}*",
                // Add other query parameters here
            ]
        ];

        try {
            return var_dump($params, true);
            $response = $this->client->request('GET', '', $params);
            return json_decode($response->getBody(), true);
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
