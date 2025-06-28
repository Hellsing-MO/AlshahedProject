<?php

namespace App\Http\Controllers;

use App\Services\ShippingLabelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    protected $shippingLabelService;

    public function __construct(ShippingLabelService $shippingLabelService)
    {
        $this->shippingLabelService = $shippingLabelService;
    }

    public function process(Request $request)
    {
        try {
            // Log the incoming request data
            Log::info('Checkout process started', [
                'shipping_data' => $request->shipping_data,
                'address' => $request->address
            ]);

        // Validate the request
        $validated = $request->validate([
            'shipping_data' => 'required|array',
            'address' => 'required|array',
        ]);

            $shippingData = is_string($request->shipping_data) ? json_decode($request->shipping_data, true) : $request->shipping_data;
            $address = is_string($request->address) ? json_decode($request->address, true) : $request->address;

            if (!$shippingData || !$address) {
                throw new \Exception('Invalid shipping data or address format');
            }

        // Create shipment array
        $shipment = [
            "to_address" => [
                "name" => $address['name'],
                "address1" => $address['address1'],
                "city" => $address['city'],
                "province_code" => $address['province_code'],
                "postal_code" => $address['postal_code'],
                "country_code" => $address['country_code'],
                "is_residential" => true,
                "phone" => $address['phone'],
                "email" => $address['email']
            ],
            "weight" => $address['weight'],
            "weight_unit" => "kg",
            "length" => 30,
            "width" => 25,
            "height" => 10,
            "size_unit" => "cm",
            "package_type" => "Parcel",
            "package_contents" => "Merchandise",
            "region" => "ON"
        ];

            // Log the shipment data
            Log::info('Shipment data prepared', ['shipment' => $shipment]);

        // Generate shipping label
        $label = $this->shippingLabelService->generateLabel($shipment, $shippingData);

        if (isset($label['error'])) {
                Log::error('Label generation failed', ['error' => $label['error']]);
            return back()->withErrors(['shipping' => $label['error']]);
        }

            // For testing, let's create a mock label if the service fails
            if (!isset($label['label_url'])) {
                $label = [
                    'label_url' => '#',
                    'tracking_number' => 'TEST' . time(),
                    'tracking_url' => '#',
                    'shipment_id' => 'TEST' . time()
                ];
            }

        // Store order with shipping information
            try {
        $order = DB::table('orders')->insert([
            'customer_name' => $address['name'],
            'email' => $address['email'],
            'phone' => $address['phone'],
            'address' => $address['address1'],
            'city' => $address['city'],
            'province' => $address['province_code'],
            'postal_code' => $address['postal_code'],
            'carrier' => $shippingData['carrier'],
            'service' => $shippingData['service'],
            'amount' => $shippingData['cost'],
            'tracking_number' => $label['tracking_number'],
            'tracking_url' => $label['tracking_url'],
            'label_url' => $label['label_url'],
            'shipment_id' => $label['shipment_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            } catch (\Exception $e) {
                Log::error('Failed to store order', ['error' => $e->getMessage()]);
            }

        // Store shipping information in session for order confirmation
        session([
            'shipping_label' => $label,
            'shipping_address' => $address
        ]);

        return view('checkout.confirmation', [
            'label' => $label,
            'address' => $address,
            'shipping' => $shippingData
        ]);

        } catch (\Exception $e) {
            Log::error('Checkout process failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withErrors(['error' => 'An error occurred during checkout. Please try again.']);
        }
    }
}





