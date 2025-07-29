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
        try {
            $response = Http::withToken($this->apiToken)
                ->timeout(30)
                ->post($this->baseUrl . 'rates', $payload);
                
            if ($response->failed()) {
                Log::error('StallionExpress API failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'url' => $this->baseUrl . 'rates'
                ]);
                return null;
            }
            
            return $response->json();
        } catch (\Exception $e) {
            Log::error('StallionExpress API exception', [
                'message' => $e->getMessage(),
                'url' => $this->baseUrl . 'rates',
                'payload' => $payload
            ]);
            return null;
        }
    }

    public function createShipment($payload)
    {
        if (!isset($payload['postage_type'])) {
            $payload['postage_type'] = 'DropOff'; // You can change this to 'Pickup' if needed
        }
        
        try {
            $response = Http::withToken($this->apiToken)
                ->timeout(30)
                ->post($this->baseUrl . 'shipments', $payload);
                
            if ($response->failed()) {
                Log::error('StallionExpress Shipment API failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'url' => $this->baseUrl . 'shipments'
                ]);
                return null;
            }
            
            return $response->json();
        } catch (\Exception $e) {
            Log::error('StallionExpress Shipment API exception', [
                'message' => $e->getMessage(),
                'url' => $this->baseUrl . 'shipments',
                'payload' => $payload
            ]);
            return null;
        }
    }
}
