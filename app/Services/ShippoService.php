<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
class ShippoService
{
 protected $apiKey;
 public function __construct()
 {
 $this->apiKey = config('services.shippo.key');
 }
 public function createShipment(array $fromAddress, array $toAddress, array $parcel)
 {
 return Http::withBasicAuth($this->apiKey, '')
 ->post('https://api.goshippo.com/shipments/', [
 'address_from' => $fromAddress,
 'address_to' => $toAddress,
 'parcels' => [$parcel],
 'async' => false,
 ])->json();
 }
 public function getSendleRates(array $shipment)
 {
 return collect($shipment['rates'] ?? [])->filter(function ($rate) {
 return $rate['provider'] === 'Sendle';
 })->values();
 }
 public function buyLabel(string $rateObjectId)
 {
 return Http::withBasicAuth($this->apiKey, '')
 ->post('https://api.goshippo.com/transactions/', [
 'rate' => $rateObjectId,
 'label_file_type' => 'PDF',
 'async' => false,
 ])->json();
 }
 public function trackShipment(string $trackingNumber)
 {
 return Http::withBasicAuth($this->apiKey, '')
 ->get("https://api.goshippo.com/tracks/sendle/$trackingNumber")
 ->json();
 }
}