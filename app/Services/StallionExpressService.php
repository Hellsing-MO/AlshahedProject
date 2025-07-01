<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class StallionExpressService
{
    protected $apiToken;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiToken =config('services.stallion.key');
        $this->baseUrl = config('services.stallion.base');
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
