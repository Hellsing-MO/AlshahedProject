<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

        // Throw an exception if the request failed
        $response->throw();

        return $response->json();
    }

    public function createShipment($payload)
    {
        
        $response = Http::withToken($this->apiToken)
            ->post($this->baseUrl . 'shipments', $payload);

        // Throw an exception if the request failed
        $response->throw();

        return $response->json();
    }

    public function trackShipment($trackingCode)
    {
        $url = $this->baseUrl . 'track?tracking_code=' . urlencode($trackingCode);

        $response = Http::withToken($this->apiToken)
            ->get($url);
        return $response->json(); 
    }

}
