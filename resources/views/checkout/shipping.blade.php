<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Checkout - Shipping</title>
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
    .floating-label-group {
      position: relative;
      margin-bottom: 32px;
    }
    .floating-label-group input {
      width: 100%;
      padding: 22px 14px 12px 14px;
      border: 1.5px solid #eee;
      border-radius: 10px;
      font-size: 17px;
      background: #fafbfc;
      transition: border-color 0.2s, background 0.2s;
      outline: none;
    }
    .floating-label-group input:focus {
      border-color: #FFB800;
      background: #fffbe6;
    }
    .floating-label {
      position: absolute;
      left: 16px;
      top: 22px;
      font-size: 16px;
      color: #bbb;
      pointer-events: none;
      transition: 0.2s;
      background: transparent;
    }
    .floating-label-group input:focus + .floating-label,
    .floating-label-group input:not(:placeholder-shown) + .floating-label {
      top: 2px;
      left: 12px;
      font-size: 13px;
      color: #FFB800;
      background: #fff;
      padding: 0 4px;
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
      margin-top: 10px;
      letter-spacing: 0.5px;
      position: relative;
      overflow: hidden;
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
      <div class="progress-bar">
        <div class="progress-bar-line"></div>
        <div class="progress-bar-step active">
          <div class="progress-bar-icon"><i class='bx bx-user'></i></div>
          <div class="progress-bar-label">Shipping</div>
        </div>
        <div class="progress-bar-step">
          <div class="progress-bar-icon"><i class='bx bx-list-check'></i></div>
          <div class="progress-bar-label">Review</div>
        </div>
        <div class="progress-bar-step">
          <div class="progress-bar-icon"><i class='bx bx-credit-card'></i></div>
          <div class="progress-bar-label">Payment</div>
        </div>
        <div class="progress-bar-step">
          <div class="progress-bar-icon"><i class='bx bx-check-circle'></i></div>
          <div class="progress-bar-label">Success</div>
        </div>
      </div>
      <div class="form-title">Shipping Information</div>
      <form action="{{ secure_url(route('checkout.calculate-shipping')) }}" method="POST" class="shipping-form" autocomplete="on">
        @csrf
        <div class="floating-label-group">
          <input type="text" name="name" placeholder=" " required>
          <label class="floating-label">Full Name</label>
        </div>
        <div class="floating-label-group">
          <input type="text" name="address1" placeholder=" " required>
          <label class="floating-label">Address</label>
        </div>
        <div style="display: flex; gap: 10px;">
          <div class="floating-label-group" style="flex:1;">
            <input type="text" name="city" placeholder=" " required>
            <label class="floating-label">City</label>
          </div>
          <div class="floating-label-group" style="flex:1;">
            <input type="text" name="province_code" placeholder=" " maxlength="2" required>
            <label class="floating-label">Province Code</label>
          </div>
        </div>
        <div style="display: flex; gap: 10px;">
          <div class="floating-label-group" style="flex:1;">
            <input type="text" name="postal_code" placeholder=" " required>
            <label class="floating-label">Postal Code</label>
          </div>
          <div class="floating-label-group" style="flex:1;">
            <input type="text" name="country_code" value="CA" placeholder=" " required>
            <label class="floating-label">Country Code</label>
          </div>
        </div>
        <div style="display: flex; gap: 10px;">
          <div class="floating-label-group" style="flex:1;">
            <input type="tel" name="phone" placeholder=" " required>
            <label class="floating-label">Phone</label>
          </div>
          <div class="floating-label-group" style="flex:1;">
            <input type="email" name="email" placeholder=" " required>
            <label class="floating-label">Email</label>
          </div>
        </div>
        <button type="submit" class="btn-main">Review Order</button>
      </form>
    </div>
  </div>
@include('home.footer')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('script.js') }}"></script>
<script>
// Animate progress bar steps
const steps = document.querySelectorAll('.progress-bar-step');
steps[0].classList.add('active');
// Floating label fix for autofill
window.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.floating-label-group input').forEach(function(input) {
    if (input.value) {
      input.classList.add('has-value');
    }
    input.addEventListener('input', function() {
      if (this.value) {
        this.classList.add('has-value');
      } else {
        this.classList.remove('has-value');
      }
    });
  });
});
// Address validation
  document.querySelector('.shipping-form').addEventListener('submit', function(e) {
    let valid = true;
    const postal = document.querySelector('input[name="postal_code"]').value;
    if (!/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/.test(postal)) {
        alert('Please enter a valid Canadian postal code.');
        valid = false;
    }
    const requiredFields = ['name', 'address1', 'city', 'province_code', 'postal_code', 'country_code', 'phone', 'email'];
    requiredFields.forEach(function(field) {
        const value = document.querySelector('input[name="' + field + '"]').value;
        if (!value) {
            alert('Please fill in all required fields.');
            valid = false;
        }
    });
    if (!valid) e.preventDefault();
  });
</script>
</body>
</html>