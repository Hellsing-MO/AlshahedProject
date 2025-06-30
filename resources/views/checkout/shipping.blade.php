@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Progress Bar -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white">
                        1
                    </div>
                    <span class="ml-2 font-medium text-blue-600">Shipping</span>
                </div>
                <div class="flex-1 mx-2">
                    <div class="h-1 bg-gray-200 rounded-full">
                        <div class="h-1 bg-blue-600 rounded-full" style="width: 33%"></div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-600">
                        2
                    </div>
                    <span class="ml-2 font-medium text-gray-500">Review</span>
                </div>
            </div>
        </div>
        
        <form id="shippingForm" action="{{ route('checkout.calculate-shipping') }}" method="POST" class="p-6">
            @csrf
            
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Shipping Information</h2>
            
            <!-- Contact Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-user-circle mr-2"></i> Contact Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="name" name="name" required value="{{ old('name', auth()->user()->name ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" required value="{{ old('email', auth()->user()->email ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>
            
            <!-- Shipping Address -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-truck mr-2"></i> Shipping Address
                </h3>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="address1" class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
                        <input type="text" id="address1" name="address1" required value="{{ old('address1') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                            <input type="text" id="city" name="city" required value="{{ old('city') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="province_code" class="block text-sm font-medium text-gray-700 mb-1">Province</label>
                            <select id="province_code" name="province_code" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Province</option>
                                @foreach(['AB','BC','MB','NB','NL','NT','NS','NU','ON','PE','QC','SK','YT'] as $province)
                                <option value="{{ $province }}" {{ old('province_code') == $province ? 'selected' : '' }}>
                                    {{ $province }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" required value="{{ old('postal_code') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div>
                        <label for="country_code" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                        <select id="country_code" name="country_code" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="CA" selected>Canada</option>
                            <option value="US">United States</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-between items-center mt-8">
                <a href="{{ route('cart') }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Return to Cart
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md font-medium transition duration-300 flex items-center">
                    Continue to Review <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('shippingForm').addEventListener('submit', function(e) {
        const requiredFields = ['name', 'email', 'phone', 'address1', 'city', 'province_code', 'postal_code'];
        let isValid = true;
        
        requiredFields.forEach(field => {
            const element = document.getElementById(field);
            if (!element.value.trim()) {
                element.classList.add('border-red-500');
                isValid = false;
            } else {
                element.classList.remove('border-red-500');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
</script>
@endpush
@endsection