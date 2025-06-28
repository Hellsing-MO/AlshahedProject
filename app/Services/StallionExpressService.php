<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class StallionExpressService
{
    protected $apiKey;
    protected $baseUrl = 'https://api.stallionexpress.ca/v4';
    protected $originPostalCode;

    public function __construct()
    {
        $this->apiKey = config('services.stallion.key');
        $this->originPostalCode = config('services.stallion.origin_postal_code');
    }

    public function getRates(array $shipment, float $orderValue, string $currency = 'CAD')
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ])->post($this->baseUrl . '/rates', [
                'from' => [
                    'postal_code' => $this->originPostalCode,
                    'country_code' => 'CA'
                ],
                'to' => [
                    'postal_code' => $shipment['to_address']['postal_code'],
                    'country_code' => $shipment['to_address']['country_code']
                ],
                'parcels' => [
                    [
                        'weight' => $shipment['weight'],
                        'weight_unit' => $shipment['weight_unit'],
                        'length' => $shipment['length'],
                        'width' => $shipment['width'],
                        'height' => $shipment['height'],
                        'dimension_unit' => $shipment['size_unit']
                    ]
                ],
                'declared_value' => $orderValue,
                'currency' => $currency,
                'service_type' => 'standard' // or 'express'
            ]);

            if ($response->successful()) {
                $rates = $response->json();
                
                // Check for free shipping conditions
                $isFree = $this->checkFreeShipping($orderValue, $currency);
                
                return [
                    'success' => true,
                    'carrier' => 'Stallion Express',
                    'service' => $rates['service_name'] ?? 'Standard',
                    'delivery_time' => $rates['estimated_delivery_days'] ?? '3-5 days',
                    'cost' => $isFree ? 0 : ($rates['total_price'] ?? 0),
                    'currency' => $currency,
                    'is_free_shipping' => $isFree,
                    'raw_rate' => $rates
                ];
            }

            Log::error('Stallion Express API error: ' . $response->body());
            return ['error' => 'Failed to get shipping rates from Stallion Express'];

        } catch (\Exception $e) {
            Log::error('Stallion Express API exception: ' . $e->getMessage());
            return ['error' => 'An error occurred while calculating shipping rates'];
        }
    }

    public function createShipment(array $shipment, array $rate)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ])->post($this->baseUrl . '/shipments', [
                'from' => [
                    'postal_code' => $this->originPostalCode,
                    'country_code' => 'CA'
                ],
                'to' => $shipment['to_address'],
                'parcels' => [
                    [
                        'weight' => $shipment['weight'],
                        'weight_unit' => $shipment['weight_unit'],
                        'length' => $shipment['length'],
                        'width' => $shipment['width'],
                        'height' => $shipment['height'],
                        'dimension_unit' => $shipment['size_unit']
                    ]
                ],
                'service' => $rate['service'],
                'reference' => $rate['reference'] ?? null,
                'label_format' => 'PDF'
            ]);

            if ($response->successful()) {
                $result = $response->json();
                return [
                    'success' => true,
                    'label_url' => $result['label_url'],
                    'tracking_number' => $result['tracking_number'],
                    'tracking_url' => $result['tracking_url'],
                    'shipment_id' => $result['id']
                ];
            }

            Log::error('Stallion Express shipment creation error: ' . $response->body());
            return ['error' => 'Failed to create shipment'];

        } catch (\Exception $e) {
            Log::error('Stallion Express shipment creation exception: ' . $e->getMessage());
            return ['error' => 'An error occurred while creating shipment'];
        }
    }

    public function trackShipment(string $trackingNumber)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ])->get($this->baseUrl . '/tracking/' . $trackingNumber);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Stallion Express tracking error: ' . $response->body());
            return ['error' => 'Failed to get tracking information'];

        } catch (\Exception $e) {
            Log::error('Stallion Express tracking exception: ' . $e->getMessage());
            return ['error' => 'An error occurred while getting tracking information'];
        }
    }

    protected function checkFreeShipping(float $orderValue, string $currency): bool
    {
        // Free shipping for orders over $150 CAD or $200 USD
        return ($currency === 'CAD' && $orderValue >= 150) || 
               ($currency === 'USD' && $orderValue >= 200);
    }
} 