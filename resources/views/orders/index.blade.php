<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Orders</title>
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
    .order-history-container {
      max-width: 900px;
      margin: 60px auto 32px auto;
      padding: 0 16px;
    }
    .order-history-card {
      background: #fff;
      border-radius: 28px;
      box-shadow: 0 16px 48px 0 rgba(255,184,0,0.13), 0 4px 16px 0 rgba(0,0,0,0.08);
      border: 1.5px solid #f3e7c3;
      padding: 48px 40px 36px 40px;
      position: relative;
      margin-bottom: 32px;
    }
    .order-history-title {
      color: #2c3e50;
      border-bottom: 2px solid #ffe066;
      padding-bottom: 10px;
      margin-bottom: 25px;
      font-weight: 700;
      letter-spacing: -1px;
      font-size: 2rem;
      text-align: center;
    }
    .order-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 12px;
      background: none;
    }
    .order-table th {
      padding: 16px 12px;
      text-align: left;
      border-bottom: 2px solid #ffe066;
      font-size: 1.08rem;
      font-weight: 700;
      color: #2c3e50;
    }
    .order-table th:first-child { border-radius: 12px 0 0 12px; }
    .order-table th:last-child { border-radius: 0 12px 12px 0; }
    .order-table tbody tr {
      background: #fffdfa;
      box-shadow: 0 2px 12px 0 rgba(255,184,0,0.07), 0 1.5px 6px 0 rgba(0,0,0,0.04);
      border-radius: 12px;
      transition: box-shadow 0.2s, background 0.2s;
    }
    .order-table tbody tr:hover {
      box-shadow: 0 4px 18px 0 rgba(52,152,219,0.13), 0 2px 8px 0 rgba(0,0,0,0.08);
      background: #f8f9fa;
    }
    .order-status {
      font-weight: 700;
      border-radius: 999px;
      padding: 6px 18px;
      font-size: 0.98rem;
      color: #fff;
      background: linear-gradient(90deg, #FFB800 60%, #ffe066 100%);
      display: inline-block;
    }
    /* Mobile card styles */
    .order-card-list { display: none; }
    @media (max-width: 700px) {
      .order-history-card { padding: 16px 2vw 16px 2vw; }
      .order-history-container { max-width: 100%; padding: 0 2vw; margin-top: 40px; }
      .order-table th, .order-table td { font-size: 0.98rem; padding: 8px 6px; }
      .order-table { display: none; }
      .order-card-list { display: block; margin: 0; padding: 0; }
      .order-card {
        background: #fffdfa;
        box-shadow: 0 2px 12px 0 rgba(255,184,0,0.07), 0 1.5px 6px 0 rgba(0,0,0,0.04);
        border-radius: 16px;
        margin-bottom: 18px;
        padding: 18px 14px;
        font-size: 1.05rem;
        display: flex;
        flex-direction: column;
        gap: 8px;
      }
      .order-card .order-status { font-size: 0.95rem; padding: 4px 12px; margin-bottom: 6px; }
      .order-card .order-products { font-size: 0.97rem; color: #2c3e50; }
      .order-card .order-view-btn {
        background: linear-gradient(90deg, #FFB800 60%, #ffe066 100%);
        color: #222;
        padding: 8px 22px;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 700;
        font-size: 15px;
        box-shadow: 0 2px 8px rgba(255,184,0,0.07);
        transition: background 0.2s;
        margin-top: 8px;
        text-align: center;
        display: inline-block;
      }
    }
  </style>
</head>
<body>
  @include('home.header')
  <br>
  <br>
  <br>
  <br>
  <div class="order-history-container">
    <div class="order-history-card">
      <h2 class="order-history-title">{{ __('messages.My Orders') }}</h2>
      
      @if(session('orders_linked'))
        <div style="background: #d4edda; border: 1px solid #c3e6cb; border-radius: 12px; padding: 15px; margin-bottom: 20px; text-align: center;">
          <i class='bx bx-check-circle' style="color: #155724; font-size: 20px; margin-bottom: 8px;"></i>
          <p style="color: #155724; font-weight: 600; margin: 0; font-size: 14px;">
            🎉 {{ session('orders_linked')['message'] }}
          </p>
        </div>
      @endif
    @if($orders->count())
      <table class="order-table">
        <thead>
          <tr>
            <th>Order #</th>
            <th>Date</th>
            <th>Total</th>
            <th>Status</th>
            <th>Products</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
            <tr>
              <td>#{{ $order->id }}</td>
              <td>{{ $order->created_at->format('Y-m-d') }}</td>
              <td style="font-weight:700; color:#FFB800;">${{ number_format($order->total, 2) }}</td>
              <td><span class="order-status">{{ ucfirst($order->status) }}</span></td>
              <td>
                @foreach($order->products as $product)
                  <div style="font-size: 0.97rem; color: #2c3e50;">
                    {{ $product['description'] }} <span style="color:#bbb;">×{{ $product['quantity'] }}</span>
                  </div>
                @endforeach
              </td>
              <td>
                <a href="{{ route('orders.show', $order->id) }}" style="background: linear-gradient(90deg, #FFB800 60%, #ffe066 100%); color: #222; padding: 8px 22px; border-radius: 999px; text-decoration: none; font-weight: 700; font-size: 15px; box-shadow: 0 2px 8px rgba(255,184,0,0.07); transition: background 0.2s;">View</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <!-- Mobile card list -->
      <div class="order-card-list">
        @foreach($orders as $order)
          <div class="order-card">
            <div><b>Order #</b> {{ $order->id }}</div>
            <div><b>Date:</b> {{ $order->created_at->format('Y-m-d') }}</div>
            <div><b>Total:</b> <span style="font-weight:700; color:#FFB800;">${{ number_format($order->total, 2) }}</span></div>
            <div><span class="order-status">{{ ucfirst($order->status) }}</span></div>
            <div class="order-products">
              @foreach($order->products as $product)
                <div>{{ $product['description'] }} <span style="color:#bbb;">×{{ $product['quantity'] }}</span></div>
              @endforeach
            </div>
            <a href="{{ route('orders.show', $order->id) }}" class="order-view-btn">View</a>
          </div>
        @endforeach
      </div>
    @else
      <div style="text-align:center; padding: 40px 0; color:#7f8c8d; font-size: 1.2rem; font-weight: 600;">You have not placed any orders yet.</div>
    @endif
  </div>
</div>
@include('home.footer')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('script.js') }}"></script>
</body>
</html> 