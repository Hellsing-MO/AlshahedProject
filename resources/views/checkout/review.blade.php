@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Progress Bar -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-500 text-white">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="ml-2 font-medium text-gray-600">Shipping</span>
                </div>
                <div class="flex-1 mx-2">
                    <div class="h-1 bg-gray-200 rounded-full">
                        <div class="h-1 bg-blue-600 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white">
                        2
                    </div>
                    <span class="ml-2 font-medium text-blue-600">Review</span>
                </div>
                <div class="flex-1 mx-2">
                    <div class="h-1 bg-gray-200 rounded-full">
                        <div class="h-1 bg-blue-600 rounded-full" style="width: 33%"></div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-600">
                        3
                    </div>
                    <span class="ml-2 font-medium text-gray-500">Payment</span>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Order Summary -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Order Summary</h2>
                    
                    <div class="divide-y divide-gray-200">
                        @foreach($cartItems as $item)
                        <div class="py-4 flex">
                            <div class="flex-shrink-0 w-20 h-20 bg-gray-200 rounded-md overflow-hidden">
                                <img src="{{ asset('products/' . $item->product->image) }}" alt="{{ $item->product->title }}" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex justify-between">
                                    <h3 class="text-md font-medium text-gray-800">{{ $item->product->title }}</h3>
                                    <p class="text-md font-medium text-gray-800">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Quantity: {{ $item->quantity }}</p>
                                <p class="text-sm text-gray-500">${{ number_format($item->product->price, 2) }} each</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Shipping Information -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Shipping Information</h2>
                    <div class="space-y-2">
                        <p class="text-gray-700"><span class="font-medium">Name:</span> {{ $shippingData['name'] }}</p>
                        <p class="text-gray-700"><span class="font-medium">Address:</span> {{ $shippingData['address1'] }}</p>
                        <p class="text-gray-700">{{ $shippingData['city'] }}, {{ $shippingData['province_code'] }} {{ $shippingData['postal_code'] }}</p>
                        <p class="text-gray-700"><span class="font-medium">Phone:</span> {{ $shippingData['phone'] }}</p>
                        <p class="text-gray-700"><span class="font-medium">Email:</span> {{ $shippingData['email'] }}</p>
                    </div>
                    <a href="{{ route('checkout.shipping') }}" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">
                        <i class="fas fa-edit mr-1"></i> Edit Shipping Info
                    </a>
                </div>
            </div>
            
            <!-- Order Total & Payment -->
            <div>
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Order Total</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-gray-800">${{ number_format($cartTotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="text-gray-800">${{ number_format($shippingCost, 2) }}</span>
                        </div>
                        @if($cartTotal < 150 && $shippingCost > 0)
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i> Free shipping on orders over $150
                        </div>
                        @endif
                        <div class="border-t border-gray-200 pt-3 mt-3">
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total</span>
                                <span>${{ number_format($cartTotal + ($cartTotal < 150 ? $shippingCost : 0), 2) }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('checkout.process-payment') }}" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" name="shipping_data" value="{{ json_encode($shippingData) }}">
                        <input type="hidden" name="shipping_cost" value="{{ $shippingCost }}">
                        
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-md font-medium transition duration-300 flex items-center justify-center">
                            <i class="fas fa-lock mr-2"></i> Proceed to Payment
                        </button>
                    </form>
                    
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <i class="fas fa-shield-alt mr-2"></i> Secure checkout
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection