@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1000px; margin: 30px auto; padding: 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
  <div style="background-color: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 30px;">
    <h2 style="color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; margin-bottom: 30px; text-align: center;">Order Summary</h2>
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 40px;">
      <div>
        <h3 style="color: #3498db; margin-bottom: 15px;">Shipping Information</h3>
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 6px;">
          <p style="margin: 5px 0; line-height: 1.6;">
            <strong>{{ $shippingData['name'] }}</strong><br>
            {{ $shippingData['address1'] }}<br>
            {{ $shippingData['city'] }}, {{ $shippingData['province_code'] }} {{ $shippingData['postal_code'] }}<br>
            {{ $shippingData['country_code'] }}<br>
            Phone: {{ $shippingData['phone'] }}
          </p>
        </div>
      </div>
      
      <div>
        <h3 style="color: #3498db; margin-bottom: 15px;">Order Details</h3>
        <div style="border: 1px solid #eee; border-radius: 6px; overflow: hidden;">
          @foreach($cartItems as $item)
          <div style="display: flex; justify-content: space-between; padding: 15px; border-bottom: 1px solid #eee; background-color: #f8f9fa;">
            <div>
              <strong>{{$item->product->title}}</strong>
              <div style="color: #7f8c8d; font-size: 14px;">Qty: {{$item->quantity}}</div>
            </div>
            <div style="text-align: right;">
              ${{number_format($item->product->price * $item->quantity, 2)}}
            </div>
          </div>
          @endforeach
          
          <div style="padding: 15px; border-bottom: 1px solid #eee;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
              <span>Subtotal:</span>
              <span>${{number_format($cartTotal, 2)}}</span>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
              <span>Shipping:</span>
              <span>${{number_format($shippingCost, 2)}}</span>
            </div>
          </div>
          
          <div style="padding: 15px; background-color: #2c3e50; color: white;">
            <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 18px;">
              <span>Total:</span>
              <span>${{ number_format($cartTotal + $shippingCost, 2) }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <form action="{{ secure_url(route('checkout.process-payment')) }}" method="POST" style="text-align: center;">
      @csrf
      <input type="hidden" name="shipping_data" value="{{ json_encode($shippingData) }}">
      <input type="hidden" name="shipping_cost" value="{{ $shippingCost }}">
      <input type="hidden" name="shipping_payload" value="{{ json_encode($shippingPayload) }}"> {{-- NEW --}}
      <button type="submit" 
              style="background-color: #2ecc71; color: white; padding: 15px 30px; border: none; border-radius: 4px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background-color 0.3s; box-shadow: 0 2px 10px rgba(0,0,0,0.1); display: inline-flex; align-items: center;">
        <svg style="width: 20px; height: 20px; margin-right: 10px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M14 11V2a5 5 0 0 0-5 5v2a1 1 0 0 1-1 1H3a1 1 0 0 0-1 1v7a5 5 0 0 0 5 5h6a5 5 0 0 0 5-5v-7a1 1 0 0 0-1-1h-3z"></path>
          <line x1="8" y1="11" x2="16" y2="11"></line>
        </svg>
        Pay Securely with Stripe
      </button>
    </form>
  </div>
</div>
@endsection