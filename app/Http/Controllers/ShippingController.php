<?php

namespace App\Http\Controllers;

use App\Services\SmartShippingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    protected SmartShippingService $shippingService;

    public function __construct(SmartShippingService $shippingService)
    {
        $this->shippingService = $shippingService;
    }

    public function showCalculator(Request $request)
    {
        $count = 0;
        $weight = 0;
        $orderValue = 0;

        if (Auth::check()) {
            $count = DB::table('carts')
                ->where('user_id', Auth::id())
                ->count();

            // Get cart items with product details
            $cartItems = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', Auth::id())
                ->select('products.Weight as weight', 'products.price', 'carts.quantity')
                ->get();

            // Calculate total weight and value
            foreach ($cartItems as $item) {
                $weight += floatval($item->weight) * $item->quantity;
                $orderValue += floatval($item->price) * $item->quantity;
            }
        } else {
            // For guest users, get cart from session
            $sessionCart = session()->get('cart', []);
            $count = count($sessionCart);
            
            foreach($sessionCart as $item) {
                $weight += floatval($item['Weight']) * $item['quantity'];
                $orderValue += floatval($item['price']) * $item['quantity'];
            }
        }

        // Validate URL parameters if provided
        if ($request->has('weight') || $request->has('order_value')) {
            // Compare URL values with calculated values
            if (abs(floatval($request->weight) - $weight) > 0.01 || 
                abs(floatval($request->order_value) - $orderValue) > 0.01) {
                return redirect()->route('shipping.calculator')
                    ->with('error', 'Invalid shipping parameters detected.');
            }
        }
        
        return view('shipping.calculator', compact('count', 'weight', 'orderValue'));
    }

    public function calculate(Request $request)
    {
        $count = 0;
        if (Auth::check()) {
            $count = DB::table('carts')
                ->where('user_id', Auth::id())
                ->count();
        } else {
            $count = count(session()->get('cart', []));
        }

        try {
            // Validate the request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'country_code' => 'required|string|size:2|in:CA,US',
                'address1' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'province_code' => 'required|string|max:10',
                'postal_code' => 'required|string|max:10',
                'weight' => 'required|numeric|min:0.1',
                'order_value' => 'required|numeric|min:0',
            ]);

            // Determine currency based on country
            $currency = $validated['country_code'] === 'CA' ? 'CAD' : 'USD';

            // Create shipment array
            $shipment = [
                "to_address" => [
                    "name" => $validated['name'],
                    "address1" => $validated['address1'],
                    "city" => $validated['city'],
                    "province_code" => $validated['province_code'],
                    "postal_code" => $validated['postal_code'],
                    "country_code" => $validated['country_code'],
                    "is_residential" => true,
                    "phone" => $validated['phone'],
                    "email" => $validated['email']
                ],
                "items" => [
                    [
                    "description" => "Honey",
                    "quantity" => 2,
                    "value" => 10,
                    "currency" => "CAD",
                    ]
                ],
                "weight" => $validated['weight'],
                "weight_unit" => "kg",
                "length" => 30,
                "is_return" => false,
                "width" => 25,
                "height" => 10,
                "size_unit" => "cm",
                "package_type" => "Parcel",
            ];

            // Get shipping rates from Stallion Express
            $rate = $this->shippingService->getSmartRate(
                $shipment,
                $validated['order_value'],
                $currency
            );

            if (isset($rate['error'])) {
                return back()->withErrors(['shipping' => $rate['error']]);
            }

            // Store shipping data in session for order processing
            session([
                'shipping_data' => $rate,
                'shipping_address' => $validated
            ]);

            return view('shipping.rates', [
                'rate' => $rate,
                'address' => $validated
            ], compact('count'));

        } catch (\Exception $e) {
            Log::error('Shipping calculation failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred while calculating shipping rates. Please try again.']);
        }
    }

    public function generateLabel(Request $request)
    {
        try {
            $shippingData = session('shipping_data');
            $shippingAddress = session('shipping_address');

            if (!$shippingData || !$shippingAddress) {
                return redirect()->route('shipping.calculator')
                    ->with('error', 'Shipping information not found. Please calculate shipping rates again.');
            }

            $shipment = [
                "to_address" => $shippingAddress,
                "weight" => $request->weight,
                "weight_unit" => "kg",
                "length" => 30,
                "width" => 25,
                "height" => 10,
                "size_unit" => "cm"
            ];

            $result = $this->shippingService->createShipment($shipment, $shippingData);

            if (isset($result['error'])) {
                return back()->withErrors(['shipping' => $result['error']]);
            }

            // Store label information in session
            session(['shipping_label' => $result]);

            return view('shipping.label', [
                'label' => $result,
                'address' => $shippingAddress
            ]);

        } catch (\Exception $e) {
            Log::error('Label generation failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred while generating the shipping label. Please try again.']);
        }
    }

    public function trackShipment($trackingNumber)
    {
        try {
            $trackingInfo = $this->shippingService->trackShipment($trackingNumber);

            if (isset($trackingInfo['error'])) {
                return back()->withErrors(['tracking' => $trackingInfo['error']]);
            }

            return view('shipping.tracking', [
                'tracking' => $trackingInfo
            ]);

        } catch (\Exception $e) {
            Log::error('Tracking failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred while tracking the shipment. Please try again.']);
        }
    }
}
