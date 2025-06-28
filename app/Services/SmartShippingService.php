<?php
namespace App\Services;

use GuzzleHttp\Client;
use Exception;

class SmartShippingService
{
    protected $client;
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = config('services.stallion.base');
        $this->token = config('services.stallion.key');
    }

    public function getSmartRate(array $shipment, float $orderValue, string $currency): array
    {
        try {
            $shipment['value'] = $orderValue;
            $shipment['currency'] = $currency;
            $response = $this->client->post($this->baseUrl . '/rates', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                    'Accept' => 'application/json',
                ],
                'json' => $shipment
            ]);
            $rates = json_decode($response->getBody(), true);

            if (!$rates['success'] || empty($rates['rates'])) {
                return ['error' => 'No shipping rates available.'];
            }

            $cheapest = collect($rates['rates'])->sortBy('total')->first();
            $country = $shipment['to_address']['country_code'];

            $isFree =
                ($country === 'CA' && $currency === 'CAD' && $orderValue >= 150) ||
                ($country === 'US' && $currency === 'USD' && $orderValue >= 200);

            return [
                'success' => true,
                'carrier' => $cheapest['postage_type'] ?? 'Standard',
                'service' => $cheapest['postage_type'] ?? 'Standard',
                'delivery_time' => ($cheapest['delivery_days'] ?? '3-5') . ' days',
                'cost' => $isFree ? 0 : ($cheapest['total'] ?? 0),
                'currency' => $cheapest['currency'] ?? $currency,
                'is_free_shipping' => $isFree,
                'raw_rate' => $cheapest,
            ];

        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
