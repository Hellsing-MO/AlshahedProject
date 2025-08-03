<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Checkout - Success</title>
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
      animation: slideFadeIn 0.7s cubic-bezier(.23,1.01,.32,1) both;
      position: relative;
      text-align: center;
    }
    @keyframes slideFadeIn {
      from { opacity: 0; transform: translateY(60px); }
      to { opacity: 1; transform: none; }
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
    }
    .progress-bar-icon {
      width: 38px; height: 38px;
      border-radius: 50%;
      background: #fff;
      border: 2.5px solid #eee;
      display: flex; align-items: center; justify-content: center;
      font-size: 22px;
      color: #bbb;
      margin-bottom: 6px;
      transition: border-color 0.3s, color 0.3s;
    }
    .progress-bar-step.active .progress-bar-icon {
      border-color: #FFB800;
      color: #FFB800;
      background: #fffbe6;
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
    .success-icon {
      font-size: 70px;
      color: #2ecc71;
      margin-bottom: 18px;
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
          <div class="progress-bar-step{{ $step == 'Success' ? ' active' : '' }}">
            <div class="progress-bar-icon">
              @if($step == 'Shipping')<i class='bx bx-user'></i>@endif
              @if($step == 'Review')<i class='bx bx-list-check'></i>@endif
              @if($step == 'Payment')<i class='bx bx-credit-card'></i>@endif
              @if($step == 'Success')<i class='bx bx-check-circle'></i>@endif
            </div>
            <div class="progress-bar-label">{{ __('messages.' . $step) }}</div>
          </div>
        @endforeach
      </div>
      <div class="form-title">{{ __('messages.Thank you for your order!') }}</div>
      <div class="success-icon"><i class='bx bx-check-circle'></i></div>
      <p style="font-size: 19px; color: #2ecc71; font-weight: 600; margin-bottom: 10px;">{{ __('messages.Your payment was successful!') }}</p>
      <p style="font-size: 17px; color: #7f8c8d;">{{ __('messages.We are processing your order and will send you a confirmation email soon.') }}<br>{{ __('messages.Thank you for shopping with Alshahed Honey!') }}</p>

      <div style="margin-top: 28px; padding-top: 24px; border-top: 1px solid #eee; text-align: left;">
        @if($order->tracking_info && !empty($order->tracking_info['tracking_number']))
            <h3 style="font-size: 18px; font-weight: 600; color: #2c3e50; margin-bottom: 12px;">Shipment Details:</h3>
            <p style="color: #34495e; margin-bottom: 4px;"><strong>Tracking Number:</strong> {{ $order->tracking_info['tracking_number'] }}</p>
            <p style="color: #34495e; margin-bottom: 8px;"><strong>Carrier:</strong> {{ $order->tracking_info['carrier'] ?? 'N/A' }}</p>
            @if(!empty($order->tracking_info['tracking_url']))
                <a href="{{ $order->tracking_info['tracking_url'] }}" target="_blank" style="color: #FFB800; font-weight: 600; text-decoration: none;">Track Your Order →</a>
            @endif
        @else
            <h3 style="font-size: 18px; font-weight: 600; color: #2c3e50; margin-bottom: 12px;">Your order is confirmed!</h3>
            <p style="color: #34495e;">We are currently processing your shipment. You will receive an email with your tracking number as soon as it's available.</p>
        @endif
      </div>
      
      @if(!Auth::check())
        <div style="margin-top: 20px; padding: 15px; background: #e8f5e8; border: 1px solid #4caf50; border-radius: 12px; text-align: center;">
          <i class='bx bx-info-circle' style="color: #2e7d32; font-size: 18px; margin-bottom: 8px;"></i>
          <p style="color: #2e7d32; font-weight: 600; margin: 0 0 10px 0; font-size: 14px;">
            💡 {{ __('messages.Create an account with the same email address to automatically link this order and track all your future orders!') }}
          </p>
          <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('login') }}" style="background: #3498db; color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 13px; font-weight: 600;">
              <i class='bx bx-log-in'></i> {{ __('messages.Login') }}
            </a>
            <a href="{{ route('register') }}" style="background: #27ae60; color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 13px; font-weight: 600;">
              <i class='bx bx-user-plus'></i> {{ __('messages.Create Account') }}
            </a>
          </div>
        </div>
      @endif
      
      <a href="/" class="btn-main" style="margin-top: 18px;">{{ __('messages.Return to Home') }}</a>
    </div>
  </div>
@include('home.footer')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('script.js') }}"></script>
</body>
</html>
