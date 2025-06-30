@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1200px; margin: 30px auto; padding: 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
  <h2 style="color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; margin-bottom: 25px;">My Shopping Cart</h2>
  
  @if(count($cartItems) > 0)
    <div style="overflow-x: auto;">
      <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead>
          <tr style="background-color: #f8f9fa;">
            <th style="padding: 12px 15px; text-align: left; border-bottom: 2px solid #dee2e6;">Product</th>
            <th style="padding: 12px 15px; text-align: center; border-bottom: 2px solid #dee2e6;">Qty</th>
            <th style="padding: 12px 15px; text-align: right; border-bottom: 2px solid #dee2e6;">Price</th>
            <th style="padding: 12px 15px; text-align: right; border-bottom: 2px solid #dee2e6;">Total</th>
            <th style="padding: 12px 15px; text-align: center; border-bottom: 2px solid #dee2e6;">Action</th>
          </tr>
        </thead>
        <tbody>
          @php($total = 0)
          @foreach($cartItems as $item)
          @php($subtotal = $item->product->price * $item->quantity)
          @php($total += $subtotal)
          <tr style="border-bottom: 1px solid #eee;">
            <td style="padding: 12px 15px;">{{$item->product->title}}</td>
            <td style="padding: 12px 15px; text-align: center;">{{$item->quantity}}</td>
            <td style="padding: 12px 15px; text-align: right;">${{number_format($item->product->price, 2)}}</td>
            <td style="padding: 12px 15px; text-align: right;">${{number_format($subtotal, 2)}}</td>
            <td style="padding: 12px 15px; text-align: center;">
              <a href="{{url('delete_cart', $item->id)}}" style="background-color: #e74c3c; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; display: inline-block; transition: background-color 0.3s;">Remove</a>
            </td>
          </tr>
          @endforeach
          <tr style="background-color: #f8f9fa; font-weight: bold;">
            <td colspan="3" style="padding: 12px 15px; text-align: right;">Total:</td>
            <td style="padding: 12px 15px; text-align: right;">${{number_format($total, 2)}}</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <div style="display: flex; justify-content: flex-end;">
      <a href="{{route('checkout.shipping')}}" style="background-color: #3498db; color: white; padding: 12px 24px; border-radius: 4px; text-decoration: none; font-weight: bold; transition: background-color 0.3s; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">Proceed to Checkout</a>
    </div>
  @else
    <div style="text-align: center; padding: 40px 20px; background-color: #f8f9fa; border-radius: 8px;">
      <p style="font-size: 18px; color: #7f8c8d; margin-bottom: 20px;">Your cart is empty.</p>
      <a href="{{ url('/') }}" style="background-color: #3498db; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; transition: background-color 0.3s;">Continue Shopping</a>
    </div>
  @endif
</div>
@endsection