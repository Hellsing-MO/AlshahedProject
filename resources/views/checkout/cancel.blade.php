@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden text-center">
        <div class="bg-yellow-500 p-6 text-white">
            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-exclamation-triangle text-yellow-500 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold mb-2">Order Cancelled</h1>
            <p class="text-lg">Your payment was not completed</p>
        </div>
        
        <div class="p-6">
            <p class="text-gray-600 mb-6">You can return to your cart to complete your purchase or continue shopping.</p>
            
            <div class="flex justify-center space-x-4">
                <a href="{{ route('cart') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition duration-300">
                    Return to Cart
                </a>
                <a href="{{ route('home') }}" class="border border-blue-600 text-blue-600 hover:bg-blue-50 px-6 py-2 rounded-md font-medium transition duration-300">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>
@endsection