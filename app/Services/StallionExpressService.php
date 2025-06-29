<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class StallionExpressService
{
    protected $apiToken;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiToken = env('STALLION_API_TOKEN');
        $this->baseUrl = 'https://ship.stallionexpress.ca/api/v4/';
    }

    public function getShippingRates($payload)
    {
        $response = Http::withToken($this->apiToken)
            ->post($this->baseUrl . 'rates', $payload);

        return $response->json();
    }

    public function createShipment($payload)
    {
        $response = Http::withToken($this->apiToken)
            ->post($this->baseUrl . 'shipments', $payload);

        return $response->json();
    }
}
