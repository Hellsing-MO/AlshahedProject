@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-green-600 p-6 text-white text-center">
            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check text-green-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold mb-2">Order Confirmed!</h1>
            <p class="text-lg">Thank you for your purchase</p>
        </div>
        
        <div class="p-6">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Order Details</h2>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="grid grid-cols-2 gap-4 mb-2">
                        <div>
                            <p class="text-sm text-gray-500">Order Total</p>
                            <p class="font-medium">${{ number_format($orderTotal, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Payment Method</p>
                            <p class="font-medium">Credit Card</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Shipping Information</h2>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="font-medium">{{ $shippingName }}</p>
                    <p>{{ $shippingAddress }}</p>
                    <p>{{ $shippingCity }}, {{ $shippingProvince }} {{ $shippingPostalCode }}</p>
                </div>
            </div>
            
            <div class="text-center">
                <p class="text-gray-600 mb-4">We've sent a confirmation email with your order details.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition duration-300">
                        Continue Shopping
                    </a>
                    <a href="{{ route('orders') }}" class="border border-blue-600 text-blue-600 hover:bg-blue-50 px-6 py-2 rounded-md font-medium transition duration-300">
                        View Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection