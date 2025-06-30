@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Progress Stepper -->
        <div class="mb-12">
            <ol class="flex items-center">
                <li class="flex items-center text-blue-600">
                    <span class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <svg class="w-4 h-4 text-white lg:w-5 lg:h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="ml-3 text-sm font-medium lg:text-base">Shipping</span>
                </li>
                
                <li class="flex items-center after:content-[''] after:w-24 after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6">
                    <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <span class="text-gray-500">2</span>
                    </span>
                    <span class="ml-3 text-sm font-medium text-gray-500 lg:text-base">Review</span>
                </li>
                
                <li class="flex items-center after:content-[''] after:w-24 after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6">
                    <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <span class="text-gray-500">3</span>
                    </span>
                    <span class="ml-3 text-sm font-medium text-gray-500 lg:text-base">Payment</span>
                </li>
            </ol>
        </div>

        <!-- Shipping Form -->
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Shipping Information</h1>
                <p class="text-gray-600 mb-6">Please enter your details to calculate shipping costs</p>
                
                <form id="shippingForm" action="{{ secure_url(route('checkout.calculate-shipping')) }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Contact Information -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            Contact Information
                        </h2>
                        
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" id="name" name="name" required value="{{ old('name', auth()->user()->name ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" required value="{{ old('email', auth()->user()->email ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border">
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border"
                                    placeholder="+1 (___) ___-____">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Shipping Address -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            Shipping Address
                        </h2>
                        
                        <div>
                            <label for="address1" class="block text-sm font-medium text-gray-700">Address Line 1</label>
                            <input type="text" id="address1" name="address1" required value="{{ old('address1') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border">
                        </div>
                        
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" id="city" name="city" required value="{{ old('city') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border">
                            </div>
                            
                            <div>
                                <label for="province_code" class="block text-sm font-medium text-gray-700">Province</label>
                                <select id="province_code" name="province_code" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border">
                                    <option value="">Select Province</option>
                                    @foreach(['AB'=>'Alberta','BC'=>'British Columbia','MB'=>'Manitoba','NB'=>'New Brunswick','NL'=>'Newfoundland','NT'=>'Northwest Territories','NS'=>'Nova Scotia','NU'=>'Nunavut','ON'=>'Ontario','PE'=>'Prince Edward Island','QC'=>'Quebec','SK'=>'Saskatchewan','YT'=>'Yukon'] as $code => $name)
                                    <option value="{{ $code }}" {{ old('province_code') == $code ? 'selected' : '' }}>
                                        {{ $name }} ({{ $code }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                <input type="text" id="postal_code" name="postal_code" required value="{{ old('postal_code') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border"
                                    placeholder="A1A 1A1">
                            </div>
                        </div>
                        
                        <div>
                            <label for="country_code" class="block text-sm font-medium text-gray-700">Country</label>
                            <select id="country_code" name="country_code" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border">
                                <option value="CA" selected>Canada</option>
                                <option value="US">United States</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="flex flex-col-reverse sm:flex-row sm:justify-between sm:items-center gap-4 pt-4">
                        <a href="{{ route('home') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Return
                        </a>
                        
                        <button type="submit" class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Continue to Review
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('shippingForm');
        const requiredFields = ['name', 'email', 'phone', 'address1', 'city', 'province_code', 'postal_code'];
        
        // Enhanced validation with error messages
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            requiredFields.forEach(field => {
                const element = document.getElementById(field);
                const errorElement = document.getElementById(`${field}-error`);
                
                if (!element.value.trim()) {
                    element.classList.add('border-red-500');
                    if (errorElement) errorElement.classList.remove('hidden');
                    isValid = false;
                } else {
                    element.classList.remove('border-red-500');
                    if (errorElement) errorElement.classList.add('hidden');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                
                // Scroll to first error
                const firstError = document.querySelector('.border-red-500');
                if (firstError) {
                    firstError.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            }
        });
        
        // Phone number formatting
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                const x = e.target.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,4})/);
                e.target.value = !x[2] ? x[1] : x[1] + ' (' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '');
            });
        }
        
        // Postal code formatting
        const postalInput = document.getElementById('postal_code');
        if (postalInput) {
            postalInput.addEventListener('input', function(e) {
                let value = e.target.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
                if (value.length > 3) {
                    value = value.substring(0, 3) + ' ' + value.substring(3, 6);
                }
                e.target.value = value;
            });
        }
    });
</script>
@endpush
@endsection