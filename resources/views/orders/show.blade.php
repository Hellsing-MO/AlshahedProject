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
    .delivery-status {
      font-weight: 700;
      border-radius: 999px;
      padding: 6px 18px;
      font-size: 0.98rem;
      color: #fff;
      display: inline-block;
      margin-left: 12px;
    }
    .status-pending { background: linear-gradient(90deg, #f39c12 60%, #f1c40f 100%); }
    .status-ready { background: linear-gradient(90deg, #3498db 60%, #5dade2 100%); }
    .status-received { background: linear-gradient(90deg, #9b59b6 60%, #bb8fce 100%); }
    .status-processing { background: linear-gradient(90deg, #e67e22 60%, #f5b041 100%); }
    .status-in-transit { background: linear-gradient(90deg, #2980b9 60%, #5dade2 100%); }
    .status-delivered { background: linear-gradient(90deg, #27ae60 60%, #58d68d 100%); }
    .status-exception { background: linear-gradient(90deg, #e74c3c 60%, #ec7063 100%); }
    .status-contact { background: linear-gradient(90deg, #95a5a6 60%, #bdc3c7 100%); }
    
    .order-info-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
      font-size: 1.08rem;
    }
    .status-container {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 8px;
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
      margin-right: 12px;
    }
    .back-orders-btn:hover {
      background: linear-gradient(90deg, #e6a700 60%, #ffe066 100%);
      transform: scale(1.04);
    }
    @media (max-width: 700px) {
      .order-details-card { padding: 12px 2vw 12px 2vw; }
      .order-details-container { max-width: 100%; padding: 0 2vw; margin-top: 24px; }
      .order-details-title { font-size: 1.3rem; }
      .order-info-row { flex-direction: column; gap: 8px; font-size: 1rem; align-items: flex-start; }
      .status-container { margin-top: 8px; }
      .delivery-status { margin-left: 0; }
      .order-products-list { gap: 8px; }
      .order-product-item { flex-direction: column; align-items: flex-start; gap: 6px; padding: 10px 0; }
      .order-product-img { width: 54px; height: 54px; border-radius: 8px; }
      .order-product-title { font-size: 1rem; }
      .order-product-price { margin-left: 0; font-size: 1rem; }
      .order-total-row { font-size: 1rem; flex-direction: column; gap: 4px; }
      .back-orders-btn { width: 100%; margin-bottom: 10px; margin-right: 0; font-size: 1.1rem; padding: 12px 0; }
      .order-details-card { margin-bottom: 18px; }
      .order-shipping-box { font-size: 0.98rem; }
    }
    @media print {
      body { background: #fff !important; }
      .order-details-container, .order-details-card { box-shadow: none !important; border: none !important; background: #fff !important; }
      .order-details-title, .order-section-title { color: #222 !important; border: none !important; }
      .order-status, .delivery-status, .back-orders-btn, .order-product-img, .order-shipping-box { box-shadow: none !important; background: none !important; color: #222 !important; }
      .back-orders-btn, .order-status, .delivery-status, .order-section-title, .order-details-title { color: #222 !important; background: none !important; }
      .back-orders-btn, .order-status, .delivery-status { display: none !important; }
      .order-product-img { width: 40px !important; height: 40px !important; }
    }
  </style>
</head>
<body>
@include('home.header')
<br>
<br>
<br>
<br>
<div class="order-details-container">
  <div class="order-details-card">
    <div class="order-details-title">Order #{{ $order->id }}</div>
    <div class="order-info-row">
      <div><b>Date:</b> {{ $order->created_at->format('Y-m-d') }}</div>
      <div class="status-container">
        <span class="order-status">{{ ucfirst($order->status) }}</span>
        @if(isset($deliveryStatus) && !is_null($deliveryStatus))
          @php
            $displayStatus = '';
            $statusClass = '';
            
            switch(strtolower($deliveryStatus)) {
              case 'pending':
                $displayStatus = 'Pending';
                $statusClass = 'status-pending';
                break;
              case 'ready':
                $displayStatus = 'Ready to Ship';
                $statusClass = 'status-ready';
                break;
              case 'received':
                $displayStatus = 'Order Received';
                $statusClass = 'status-received';
                break;
              case 'processing':
                $displayStatus = 'Processing';
                $statusClass = 'status-processing';
                break;
              case 'in transit':
                $displayStatus = 'In Transit';
                $statusClass = 'status-in-transit';
                break;
              case 'delivered':
                $displayStatus = 'Delivered';
                $statusClass = 'status-delivered';
                break;
              case 'exception':
                $displayStatus = 'Delivery Issue';
                $statusClass = 'status-exception';
                break;
              case 'complete':
                $displayStatus = 'Complete';
                $statusClass = 'status-delivered';
                break;
              case 'postage expired':
              case 'incomplete':
              case 'void requested':
              case 'voided':
                $displayStatus = 'Contact Support';
                $statusClass = 'status-contact';
                break;
              default:
                $displayStatus = ucwords($deliveryStatus);
                $statusClass = 'status-pending';
            }
          @endphp
          <span class="delivery-status {{ $statusClass }}">{{ $displayStatus }}</span>
        @endif
      </div>
    </div>
    @if($order->tracking_info && $order->tracking_info['tracking_number'])
      <div class="order-section-title">Tracking Information</div>
      <div class="order-shipping-box" style="margin-bottom: 18px;">
        <b>Tracking Number:</b> {{ $order->tracking_info['tracking_number'] }}<br>
        @if($order->tracking_info['carrier'])<b>Carrier:</b> {{ $order->tracking_info['carrier'] }}<br>@endif
        @if($order->tracking_info['status'])<b>Status:</b> {{ $order->tracking_info['status'] }}<br>@endif
        @if($order->tracking_info['tracking_url'])<a href="{{ $order->tracking_info['tracking_url'] }}" target="_blank" style="color:#3498db; text-decoration:underline;">Track Shipment</a>@endif
      </div>
    @endif
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
    <button onclick="window.print()" class="back-orders-btn" style="background: linear-gradient(90deg, #3498db 60%, #b6e0fe 100%); color: #fff;">🖨 Print Invoice</button>
  </div>
</div>
@include('home.footer')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('script.js') }}"></script>
</body>
</html>
