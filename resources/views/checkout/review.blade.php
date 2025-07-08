<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Checkout - Review</title>
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
    .checkout-container {
      max-width: 540px;
      margin: 90px auto 32px auto;
      padding: 0 16px;
      display: flex;
      flex-direction: column;
      min-height: calc(100vh - 120px);
      justify-content: center;
    }
    .checkout-card {
      background: #fff;
      border-radius: 28px;
      box-shadow: 0 16px 48px 0 rgba(255,184,0,0.13), 0 4px 16px 0 rgba(0,0,0,0.08);
      border: 1.5px solid #f3e7c3;
      padding: 48px 40px 36px 40px;
      animation: cardPopIn 0.7s cubic-bezier(.23,1.01,.32,1) both;
      position: relative;
    }
    @keyframes cardPopIn {
      0% { opacity: 0; transform: scale(0.92) translateY(60px); }
      60% { opacity: 1; transform: scale(1.03) translateY(-8px); }
      100% { opacity: 1; transform: scale(1) translateY(0); }
    }
    .progress-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 32px;
      position: relative;
    }
    .progress-bar-step {
      display: flex;
      flex-direction: column;
      align-items: center;
      flex: 1;
      z-index: 1;
      animation: progressFadeIn 0.7s cubic-bezier(.23,1.01,.32,1) both;
    }
    @keyframes progressFadeIn {
      0% { opacity: 0; transform: scale(0.7); }
      100% { opacity: 1; transform: scale(1); }
    }
    .progress-bar-step:nth-child(1) { animation-delay: 0.05s; }
    .progress-bar-step:nth-child(2) { animation-delay: 0.15s; }
    .progress-bar-step:nth-child(3) { animation-delay: 0.25s; }
    .progress-bar-step:nth-child(4) { animation-delay: 0.35s; }
    .progress-bar-icon {
      width: 38px; height: 38px;
      border-radius: 50%;
      background: #fff;
      border: 2.5px solid #eee;
      display: flex; align-items: center; justify-content: center;
      font-size: 22px;
      color: #bbb;
      margin-bottom: 6px;
      transition: border-color 0.3s, color 0.3s, box-shadow 0.3s;
    }
    .progress-bar-step.active .progress-bar-icon {
      border-color: #FFB800;
      color: #FFB800;
      background: #fffbe6;
      box-shadow: 0 0 0 4px #ffe06655;
      animation: iconPulse 1.1s cubic-bezier(.23,1.01,.32,1) infinite alternate;
    }
    @keyframes iconPulse {
      0% { box-shadow: 0 0 0 4px #ffe06655; }
      100% { box-shadow: 0 0 0 10px #ffe06622; }
    }
    .progress-bar-label {
      font-size: 13px;
      color: #bbb;
      font-weight: 500;
      transition: color 0.3s;
    }
    .progress-bar-step.active .progress-bar-label {
      color: #FFB800;
    }
    .progress-bar-line {
      position: absolute;
      top: 19px; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, #FFB800 0%, #fffbe6 100%);
      z-index: 0;
    }
    .form-title {
      color: #2c3e50;
      margin-bottom: 38px;
      text-align: center;
      font-size: 2.3rem;
      font-weight: 700;
      letter-spacing: -1px;
    }
    .order-summary, .shipping-summary {
      background: #f8f9fa;
      border-radius: 12px;
      padding: 20px 18px;
      margin-bottom: 24px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .order-summary h3, .shipping-summary h3 {
      color: #3498db;
      margin-bottom: 12px;
      font-size: 1.1rem;
      font-weight: 600;
    }
    .order-details-row {
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
      border-bottom: 1px solid #eee;
      font-size: 1rem;
    }
    .order-details-row:last-child {
      border-bottom: none;
    }
    .order-total-row {
      background: #2c3e50;
      color: #fff;
      font-weight: bold;
      font-size: 1.1rem;
      border-radius: 0 0 12px 12px;
      padding: 14px 18px;
      margin-top: -8px;
      display: flex;
      justify-content: space-between;
    }
    .free-shipping-badge {
      display: inline-block;
      background: linear-gradient(90deg, #2ecc71 60%, #b6f7c1 100%);
      color: #fff;
      font-weight: 700;
      font-size: 15px;
      border-radius: 999px;
      padding: 6px 18px;
      margin-left: 8px;
      margin-bottom: 2px;
      box-shadow: 0 2px 8px rgba(46,204,113,0.09);
      letter-spacing: 0.5px;
      vertical-align: middle;
      animation: badgePop 0.7s cubic-bezier(.23,1.01,.32,1) both;
    }
    @keyframes badgePop {
      0% { opacity: 0; transform: scale(0.7); }
      100% { opacity: 1; transform: scale(1); }
    }
    .btn-main {
      background: linear-gradient(90deg, #FFB800 60%, #ffe066 100%);
      color: #fff;
      padding: 15px 0;
      width: 100%;
      border: none;
      border-radius: 999px;
      font-size: 18px;
      font-weight: 700;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(255,184,0,0.07);
      transition: background 0.2s, transform 0.1s;
      margin-top: 24px;
      letter-spacing: 0.5px;
      position: relative;
      overflow: hidden;
      display: inline-block;
      max-width: 260px;
    }
    .btn-main:active {
      transform: scale(0.98);
    }
    .edit-cart-link {
      display: inline-block;
      background: #FFB800;
      color: #fff;
      padding: 10px 24px;
      border-radius: 999px;
      font-weight: bold;
      text-decoration: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.07);
      transition: background 0.2s;
      margin-bottom: 18px;
      margin-left: auto;
      margin-right: 0;
    }
    .edit-cart-link:hover {
      background: #e6a700;
    }
    @media (max-width: 600px) {
      .checkout-container { max-width: 100%; padding: 0 2vw; margin-top: 90px; min-height: unset; }
      .checkout-card { padding: 12px 2vw 12px 2vw; }
      .form-title { font-size: 1.3rem; }
      .btn-main { font-size: 16px; }
    }
  </style>
</head>
<body>
  @include('home.header')
  <div class="checkout-container">
    <div class="checkout-card">
      @php($steps = ['Shipping', 'Review', 'Payment', 'Success'])
      <div class="progress-bar">
        <div class="progress-bar-line"></div>
        @foreach($steps as $step)
          <div class="progress-bar-step{{ $step == 'Review' ? ' active' : '' }}">
            <div class="progress-bar-icon">
              @if($step == 'Shipping')<i class='bx bx-user'></i>@endif
              @if($step == 'Review')<i class='bx bx-list-check'></i>@endif
              @if($step == 'Payment')<i class='bx bx-credit-card'></i>@endif
              @if($step == 'Success')<i class='bx bx-check-circle'></i>@endif
            </div>
            <div class="progress-bar-label">{{ $step }}</div>
          </div>
        @endforeach
      </div>
      <div class="form-title">Order Review</div>
      <a href="{{ url('/mycart') }}" class="edit-cart-link">← Edit Cart</a>
      <div class="shipping-summary">
        <h3>Shipping Information</h3>
          <p style="margin: 5px 0; line-height: 1.6;">
            <strong>{{ $shippingData['name'] }}</strong><br>
            {{ $shippingData['address1'] }}<br>
            {{ $shippingData['city'] }}, {{ $shippingData['province_code'] }} {{ $shippingData['postal_code'] }}<br>
            {{ $shippingData['country_code'] }}<br>
            Phone: {{ $shippingData['phone'] }}
          </p>
        </div>
      <div class="order-summary">
        <h3>Order Details</h3>
          @foreach($cartItems as $item)
        <div class="order-details-row">
            <div>
              <strong>{{$item->product->title}}</strong>
            <span style="color: #7f8c8d; font-size: 14px;">&nbsp;× {{$item->quantity}}</span>
            </div>
            <div style="text-align: right;">
              ${{number_format($item->product->price * $item->quantity, 2)}}
            </div>
          </div>
          @endforeach
        <div class="order-details-row">
              <span>Subtotal:</span>
              <span>${{number_format($cartTotal, 2)}}</span>
            </div>
        <div class="order-details-row">
          <span>Shipping:
            @if($shippingCost == 0)
              <span class="free-shipping-badge"><i class='bx bx-gift'></i> Free Shipping</span>
            @endif
          </span>
          <span>
            @if($shippingCost == 0)
              <span style="color: #2ecc71; font-weight: 600;">FREE</span>
            @else
              ${{number_format($shippingCost, 2)}}
            @endif
          </span>
            </div>
        <div class="order-total-row">
              <span>Total:</span>
              <span>${{ number_format($cartTotal + $shippingCost, 2) }}</span>
        </div>
      </div>
      <form action="{{ secure_url(route('checkout.process-payment')) }}" method="POST" style="text-align: center; margin-top: 24px;">
      @csrf
      <input type="hidden" name="shipping_data" value="{{ json_encode($shippingData) }}">
      <input type="hidden" name="shipping_cost" value="{{ $shippingCost }}">
        <input type="hidden" name="shipping_payload" value="{{ json_encode($shippingPayload) }}">
        <button type="submit" class="btn-main">
          <svg style="width: 20px; height: 20px; margin-right: 10px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M14 11V2a5 5 0 0 0-5 5v2a1 1 0 0 1-1 1H3a1 1 0 0 0-1 1v7a5 5 0 0 0 5 5h6a5 5 0 0 0 5-5v-7a1 1 0 0 0-1-1h-3z"></path>
          <line x1="8" y1="11" x2="16" y2="11"></line>
        </svg>
        Pay Securely with Stripe
      </button>
    </form>
  </div>
</div>
@include('home.footer')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('script.js') }}"></script>
</body>
</html>