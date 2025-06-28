<?php

namespace App\Services;

use GuzzleHttp\Client;
use Exception;

class ShippingLabelService
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

    public function generateLabel(array $shipment, array $rate): array
    {
        try {
            // Add the selected rate to the shipment
            $shipment['rate'] = $rate['raw_rate'];

            $response = $this->client->post($this->baseUrl . '/shipments', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                    'Accept' => 'application/json',
                ],
                'json' => $shipment
            ]);

            $result = json_decode($response->getBody(), true);

            if (!$result['success']) {
                return ['error' => 'Failed to generate shipping label'];
            }

            return [
                'success' => true,
                'label_url' => $result['label_url'],
                'tracking_number' => $result['tracking_number'],
                'tracking_url' => $result['tracking_url'],
                'shipment_id' => $result['id']
            ];

        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
} 