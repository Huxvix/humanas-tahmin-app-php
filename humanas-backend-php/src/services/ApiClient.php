<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiClient {
    private const API_URL = "https://case-test-api.humanas.io";
    private $client;

    public function __construct() {
        $this->client = new Client();
    }

    public function fetchLoginRows(): array {
        try {
            $response = $this->client->get(self::API_URL);
            $payload = json_decode($response->getBody(), true);

            if ($payload['status'] !== 0 || $payload['message'] !== 'Success') {
                throw new \RuntimeException('Hatalı API yanıtı');
            }

            return $payload['data']['rows'];
        } catch (GuzzleException $e) {
            throw new \RuntimeException("Data alınırken hata oluştu: " . $e->getMessage());
        }
    }
} 