@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px; margin: 30px auto; padding: 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
  <div style="background-color: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 30px;">
    <h2 style="color: #2c3e50; margin-bottom: 25px; text-align: center;">Shipping Information</h2>
    
    <form action="{{ secure_url(route('checkout.calculate-shipping')) }}" method="POST" style="max-width: 600px; margin: 0 auto;">
      @csrf
      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">Full Name</label>
        <input type="text" name="name" placeholder="John Doe" required 
               style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px; transition: border-color 0.3s;">
      </div>
      
      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">Address</label>
        <input type="text" name="address1" placeholder="123 Main St" required 
               style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px; transition: border-color 0.3s;">
      </div>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
        <div>
          <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">City</label>
          <input type="text" name="city" placeholder="Toronto" required 
                 style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;">
        </div>
        <div>
          <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">Province Code</label>
          <input type="text" name="province_code" placeholder="ON" maxlength="2" required 
                 style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;">
        </div>
      </div>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
        <div>
          <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">Postal Code</label>
          <input type="text" name="postal_code" placeholder="M5V 3L9" required 
                 style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;">
        </div>
        <div>
          <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">Country Code</label>
          <input type="text" name="country_code" value="CA" required 
                 style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px; background-color: #f8f9fa;">
        </div>
      </div>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
        <div>
          <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">Phone</label>
          <input type="tel" name="phone" placeholder="(123) 456-7890" required 
                 style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;">
        </div>
        <div>
          <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 500;">Email</label>
          <input type="email" name="email" placeholder="your@email.com" required 
                 style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;">
        </div>
      </div>
      
      <div style="text-align: center;">
        <button type="submit" 
                style="background-color: #3498db; color: white; padding: 14px 28px; border: none; border-radius: 4px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background-color 0.3s; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
          Review Order
        </button>
      </div>
    </form>
  </div>
</div>
@endsection