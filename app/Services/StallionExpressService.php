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
        Log::info('Stallion Express Rates Request Payload:', $payload);

        $response = Http::withToken($this->apiToken)
            ->post($this->baseUrl . 'rates', $payload);

        Log::info('Stallion Express Rates Response Status: ' . $response->status());
        Log::info('Stallion Express Rates Response Body:', ['body' => $response->body()]);

        return $response->json();
    }

    public function createShipment($payload)
    {
        if (!isset($payload['postage_type'])) {
            $payload['postage_type'] = 'DropOff'; // You can change this to 'Pickup' if needed
        }
        
        $response = Http::withToken($this->apiToken)
            ->post($this->baseUrl . 'shipments', $payload);
        return $response->json();
    }
}
