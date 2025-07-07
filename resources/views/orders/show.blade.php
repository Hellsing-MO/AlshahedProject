<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Order #{{ $order->id }} Details</title>
  <link rel="stylesheet" href="{{asset('style.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', Arial, sans-serif;
      background: linear-gradient(135deg, #fffbe6 0%, #fff 100%);
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }
    .order-details-container {
      max-width: 700px;
      margin: 60px auto 32px auto;
      padding: 0 16px;
    }
    .order-details-card {
      background: #fff;
      border-radius: 28px;
      box-shadow: 0 16px 48px 0 rgba(255,184,0,0.13), 0 4px 16px 0 rgba(0,0,0,0.08);
      border: 1.5px solid #f3e7c3;
      padding: 48px 40px 36px 40px;
      position: relative;
      margin-bottom: 32px;
    }
    .order-details-title {
      color: #2c3e50;
      border-bottom: 2px solid #ffe066;
      padding-bottom: 10px;
      margin-bottom: 25px;
      font-weight: 700;
      letter-spacing: -1px;
      font-size: 2rem;
      text-align: center;
    }
    .order-status {
      font-weight: 700;
      border-radius: 999px;
      padding: 6px 18px;
      font-size: 0.98rem;
      color: #fff;
      background: linear-gradient(90deg, #FFB800 60%, #ffe066 100%);
      display: inline-block;
      margin-bottom: 18px;
    }
    .order-info-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
      font-size: 1.08rem;
    }
    .order-section-title {
      color: #3498db;
      font-weight: 600;
      margin-top: 28px;
      margin-bottom: 10px;
      font-size: 1.1rem;
    }
    .order-shipping-box {
      background: #f8f9fa;
      border-radius: 12px;
      padding: 18px 18px;
      margin-bottom: 18px;
      font-size: 1.05rem;
    }
    .order-products-list {
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .order-product-item {
      display: flex;
      align-items: center;
      gap: 18px;
      padding: 16px 0;
      border-bottom: 1px solid #eee;
    }
    .order-product-img {
      width: 64px;
      height: 64px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(52,152,219,0.08);
      border: 1.5px solid #f3e7c3;
    }
    .order-product-title {
      font-weight: 600;
      color: #2c3e50;
      font-size: 1.08rem;
    }
    .order-product-qty {
      color: #bbb;
      font-size: 1.01rem;
      margin-left: 8px;
    }
    .order-product-price {
      margin-left: auto;
      font-weight: 700;
      color: #FFB800;
      font-size: 1.08rem;
    }
    .order-total-row {
      display: flex;
      justify-content: space-between;
      font-weight: 700;
      font-size: 1.18rem;
      color: #2ecc71;
      margin-top: 18px;
      border-top: 2px solid #ffe066;
      padding-top: 16px;
    }
    .back-orders-btn {
      background: linear-gradient(90deg, #FFB800 60%, #ffe066 100%);
      color: #222;
      padding: 12px 32px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      font-size: 17px;
      box-shadow: 0 2px 8px rgba(255,184,0,0.07);
      transition: background 0.2s, transform 0.1s;
      display: inline-block;
      margin-bottom: 18px;
    }
    .back-orders-btn:hover {
      background: linear-gradient(90deg, #e6a700 60%, #ffe066 100%);
      transform: scale(1.04);
    }
    @media (max-width: 700px) {
      .order-details-card { padding: 16px 2vw 16px 2vw; }
      .order-details-container { max-width: 100%; padding: 0 2vw; margin-top: 40px; }
      .order-products-list { gap: 8px; }
      .order-product-img { width: 44px; height: 44px; border-radius: 8px; }
    }
  </style>
</head>
<body>
@include('home.header')
<div class="order-details-container">
  <div class="order-details-card">
    <div class="order-details-title">Order #{{ $order->id }}</div>
    <div class="order-info-row">
      <div><b>Date:</b> {{ $order->created_at->format('Y-m-d') }}</div>
      <div><span class="order-status">{{ ucfirst($order->status) }}</span></div>
    </div>
    <div class="order-section-title">Shipping Address</div>
    <div class="order-shipping-box">
      {{ $order->shipping_address['address1'] ?? '' }}<br>
      {{ $order->shipping_address['city'] ?? '' }}, {{ $order->shipping_address['province'] ?? '' }} {{ $order->shipping_address['postal_code'] ?? '' }}<br>
      {{ $order->shipping_address['country'] ?? '' }}<br>
      Phone: {{ $order->shipping_address['phone'] ?? '' }}
    </div>
    <div class="order-section-title">Products</div>
    <ul class="order-products-list">
      @foreach($order->products as $product)
        <li class="order-product-item">
          @php
            $img = isset($product['image']) ? asset('products/' . $product['image']) : asset('images/no-image.png');
          @endphp
          <img class="order-product-img" src="{{ $img }}" alt="{{ $product['description'] }}">
          <span class="order-product-title">{{ $product['description'] }}</span>
          <span class="order-product-qty">×{{ $product['quantity'] }}</span>
          <span class="order-product-price">${{ number_format($product['value'], 2) }}</span>
        </li>
      @endforeach
    </ul>
    <div class="order-total-row">
      <span>Total:</span>
      <span>${{ number_format($order->total, 2) }}</span>
    </div>
    <a href="{{ route('orders.index') }}" class="back-orders-btn">← Back to Orders</a>
  </div>
</div>
@include('home.footer')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('script.js') }}"></script>
</body>
</html> 