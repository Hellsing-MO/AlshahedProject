<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
    .cart-main-container {
      max-width: 900px;
      margin: 20px auto 32px auto;
      padding: 0 16px;
      display: flex;
      flex-direction: column;
      min-height: calc(100vh - 120px);
      justify-content: center;
    }
    .cart-card {
      background: #fff;
      border-radius: 28px;
      box-shadow: 0 16px 48px 0 rgba(255,184,0,0.13), 0 4px 16px 0 rgba(0,0,0,0.08);
      border: 1.5px solid #f3e7c3;
      padding: 48px 40px 36px 40px;
      animation: cartPopIn 0.7s cubic-bezier(.23,1.01,.32,1) both;
      position: relative;
      overflow: hidden;
    }
    .cart-card-accent {
      content: '';
      display: block;
      width: 100%;
      height: 12px;
      background: linear-gradient(90deg, #FFB800 0%, #ffe066 100%);
      border-radius: 28px 28px 0 0;
      position: absolute;
      top: 0; left: 0;
      z-index: 2;
    }
    @keyframes cartPopIn {
      0% { opacity: 0; transform: scale(0.92) translateY(60px); }
      60% { opacity: 1; transform: scale(1.03) translateY(-8px); }
      100% { opacity: 1; transform: scale(1) translateY(0); }
    }
    .cart-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 18px;
      margin-bottom: 30px;
      background: none;
      animation: fadeInTable 0.8s cubic-bezier(.23,1.01,.32,1) both;
    }
    @keyframes fadeInTable {
      0% { opacity: 0; transform: translateY(30px); }
      100% { opacity: 1; transform: none; }
    }
    .cart-table thead tr {
      background-color: #fffbe6;
    }
    .cart-table th {
      padding: 20px 10px;
      text-align: left;
      border-bottom: 2px solid #ffe066;
      font-size: 1.18rem;
      font-weight: 700;
      color: #2c3e50;
    }
    .cart-table th:first-child { border-radius: 16px 0 0 16px; }
    .cart-table th:last-child { border-radius: 0 16px 16px 0; }
    .cart-table tbody tr {
      background: #fffdfa;
      box-shadow: 0 4px 24px 0 rgba(255,184,0,0.10), 0 2px 8px 0 rgba(0,0,0,0.04);
      border-radius: 18px;
      transition: box-shadow 0.2s, background 0.2s;
      border: 1.5px solid #ffe066;
    }
    .cart-table tbody tr:hover {
      box-shadow: 0 8px 32px 0 rgba(52,152,219,0.13), 0 4px 16px 0 rgba(0,0,0,0.08);
      background: #f8f9fa;
    }
    .cart-product-img {
      width: 110px;
      height: 110px;
      object-fit: cover;
      border-radius: 18px;
      box-shadow: 0 2px 8px rgba(52,152,219,0.08);
      border: 2.5px solid #f3e7c3;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    .cart-table tbody tr:hover .cart-product-img {
      border-color: #FFB800;
      box-shadow: 0 4px 18px 0 rgba(52,152,219,0.13);
    }
    .cart-product-title {
      font-weight: 700;
      color: #2c3e50;
      font-size: 1.18rem;
      letter-spacing: -0.5px;
    }
    .cart-qty {
      font-size: 1.15rem;
      font-weight: 600;
    }
    .cart-price {
      font-weight: 700;
      font-size: 1.13rem;
    }
    .cart-total {
      color: #FFB800;
      font-weight: 700;
      font-size: 1.13rem;
    }
    .cart-remove-btn {
      background: linear-gradient(90deg, #e74c3c 60%, #ffb8b8 100%);
      color: white;
      padding: 10px 24px;
      border-radius: 999px;
      text-decoration: none;
      display: inline-block;
      font-weight: 700;
      font-size: 16px;
      box-shadow: 0 2px 8px rgba(231,76,60,0.09);
      transition: background 0.2s, transform 0.1s;
    }
    .cart-remove-btn:hover {
      background: linear-gradient(90deg, #c0392b 60%, #ffb8b8 100%);
      transform: scale(1.06);
    }
    .cart-total-row {
      background-color: #fffbe6;
      font-weight: bold;
    }
    .cart-total-label {
      text-align: right;
      border-radius: 0 0 0 16px;
      padding: 20px 18px;
      font-size: 1.18rem;
    }
    .cart-total-value {
      text-align: right;
      color: #e6a700;
      font-size: 1.25rem;
      border-radius: 0 0 16px 0;
      padding: 20px 18px;
      font-weight: 800;
      letter-spacing: 0.5px;
    }
    .cart-checkout-btn {
      background: linear-gradient(90deg, #FFB800 60%, #ffe066 100%);
      color: #222;
      padding: 20px 60px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 800;
      font-size: 22px;
      box-shadow: 0 2px 8px rgba(255,184,0,0.07);
      letter-spacing: 0.7px;
      transition: background 0.2s, transform 0.1s;
      margin-top: 18px;
      display: inline-block;
    }
    .cart-checkout-btn:hover {
      background: linear-gradient(90deg, #e6a700 60%, #ffe066 100%);
      transform: scale(1.04);
    }
    .cart-empty {
      text-align: center;
      padding: 60px 20px;
      background: linear-gradient(90deg, #fffbe6 60%, #fff 100%);
      border-radius: 18px;
      box-shadow: 0 2px 12px 0 rgba(255,184,0,0.07);
      margin-top: 40px;
      animation: fadeInTable 0.8s cubic-bezier(.23,1.01,.32,1) both;
    }
    .cart-empty-icon {
      font-size: 60px;
      color: #FFB800;
      margin-bottom: 18px;
    }
    .cart-empty-text {
      font-size: 21px;
      color: #7f8c8d;
      margin-bottom: 20px;
      font-weight: 600;
    }
    .cart-empty-btn {
      background: linear-gradient(90deg, #3498db 60%, #b6e0fe 100%);
      color: white;
      padding: 12px 32px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      font-size: 17px;
      box-shadow: 0 2px 8px rgba(52,152,219,0.07);
      transition: background 0.2s, transform 0.1s;
      display: inline-block;
    }
    .cart-empty-btn:hover {
      background: linear-gradient(90deg, #217dbb 60%, #b6e0fe 100%);
      transform: scale(1.04);
    }
    @media (max-width: 900px) {
      .cart-card { max-width: 100%; padding: 16px 2vw 16px 2vw; border-radius: 18px; }
      .cart-main-container { max-width: 100%; padding: 0 2vw; margin-top: 90px; min-height: unset; }
      .cart-table th, .cart-table td { font-size: 0.98rem; padding: 8px 6px; }
      .cart-product-img { width: 54px; height: 54px; border-radius: 10px; }
      .cart-table th, .cart-table td { font-size: 0.98rem; }
      .cart-checkout-btn { font-size: 16px; padding: 15px 38px; }
      .cart-total-label, .cart-total-value { font-size: 1rem; padding: 12px 8px; }
    }
    @media (min-width: 901px) {
      .cart-main-container { max-width: 1500px; }
      
      .cart-card { max-width: 100%; padding: 64px 64px 48px 64px; border-radius: 32px; box-shadow: 0 24px 64px 0 rgba(255,184,0,0.18), 0 8px 32px 0 rgba(0,0,0,0.10); border: 2.5px solid #ffe066; }
      .cart-table th, .cart-table td { font-size: 1.18rem; }
      .cart-product-img { width: 130px; height: 130px; border-radius: 22px; }
      .cart-checkout-btn { font-size: 20px; padding: 16px 60px; margin-top: 28px; }
      .cart-total-label, .cart-total-value { font-size: 1.25rem; padding: 28px 18px; }
    }
  </style>
</head>
<body>
  @include('home.header')
  <br>
  <br>
  <br>
  <br>
  <br>
<div class="cart-main-container">
  <div class="cart-card">
    <div class="cart-card-accent"></div>
    <h2 style="color: #2c3e50; border-bottom: 2px solid #ffe066; padding-bottom: 10px; margin-bottom: 25px; font-weight: 700; letter-spacing: -1px;">{{ __('messages.My Shopping Cart') }}</h2>
  @if(count($cartItems) > 0)
    <div style="overflow-x: auto;">
        <table class="cart-table">
        <thead>
            <tr>
              <th>{{ __('messages.Image') }}</th>
              <th>{{ __('messages.Product') }}</th>
              <th>{{ __('messages.Qty') }}</th>
              <th>{{ __('messages.Price') }}</th>
              <th>{{ __('messages.Total') }}</th>
              <th>{{ __('messages.Action') }}</th>
          </tr>
        </thead>
        <tbody>
          @php($total = 0)
          @foreach($cartItems as $item)
          @php($subtotal = $item->product->price * $item->quantity)
          @php($total += $subtotal)
          @php
              $locale = session('locale', 'en');
              $field = 'title_' . $locale;
          @endphp
            <tr>
              <td><img class="cart-product-img" src="{{ asset('products/' . $item->product->image) }}" alt="{{$item->product->title}}"></td>
              <td class="cart-product-title">
                @if(isset($item->product->$field) && $item->product->$field)
                    {{ $item->product->$field }}
                @elseif(method_exists($item->product, 'getTranslated'))
                    {{ $item->product->getTranslated('title') }}
                @elseif(isset($item->product->title))
                    {{ $item->product->title }}
                @else
                    {{ __('messages.Product Not Found') }}
                @endif
              </td>
              <td class="cart-qty">{{$item->quantity}}</td>
              <td class="cart-price">${{number_format($item->product->price, 2)}}</td>
              <td class="cart-total">${{number_format($subtotal, 2)}}</td>
              <td><a href="{{url('delete_cart', $item->id)}}" class="cart-remove-btn">{{ __('messages.Remove') }}</a></td>
          </tr>
          @endforeach
            <tr class="cart-total-row">
              <td colspan="4" class="cart-total-label">{{ __('messages.Total') }}:</td>
              <td class="cart-total-value">${{number_format($total, 2)}}</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="display: flex; justify-content: flex-end;">
        <a href="{{route('checkout.shipping')}}" class="cart-checkout-btn">{{ __('messages.Proceed to Checkout') }}</a>
    </div>
  @else
      <div class="cart-empty">
        <div class="cart-empty-icon"><i class='bx bx-cart'></i></div>
        <div class="cart-empty-text">{{ __('messages.Your cart is empty.') }}</div>
        <a href="{{ url('/') }}" class="cart-empty-btn">{{ __('messages.Continue Shopping') }}</a>
    </div>
  @endif
</div>
</div>

    <!--features-->

    
<!--contact-->
  <section class="contact" id="contact">
      <div class="contact-text">
        <h2 class="revial-top">{{__('messages.contact us')}}</h2>
       
        <div class="social">
          <a href="https://www.instagram.com/alshahedhoney?igsh=MThka284ZmdsemIxYQ=="><i class='bx bxl-instagram-alt revial-lift'></i></a>
          <a href="https://www.facebook.com/profile.php?id=61560393087783"><i class='bx bxl-facebook revial-top'></i></a>
          <a href="#"><i class='bx bxl-twitter revial-bottom'></i></a>
          <a href="http://wa.me/14379951819/"><i class='bx bxl-whatsapp revial-bottom'></i></a>
        </div>
      </div>

      <div class="footer-content">
        <!-- Quick Links and Contact Info Row -->
        <div class="footer-row">
          <!-- Website Links Section -->
          <div class="footer-section">
            <h3>Quick Links</h3>
            <ul class="footer-links">
              <li><a href="{{url('/')}}"><i class='bx bx-home-alt'></i> {{__('messages.Home')}}</a></li>
              <li><a href="#about"><i class='bx bx-info-circle'></i> {{__('messages.about us')}}</a></li>
              <li><a href="{{url('our_shop')}}"><i class='bx bx-store'></i> {{__('messages.our shop')}}</a></li>
              <li><a href="#contact"><i class='bx bx-phone'></i> {{__('messages.contact us')}}</a></li>
            </ul>
          </div>

          <!-- Contact Information Section -->
          <div class="footer-section">
            <h3>Contact Info</h3>
            <div class="contact-details">
              <div class="contact-item">
                <a href="https://maps.google.com/?q=45+Grenoble+Dr,+North+York,+ON+M3C+1C4,+Canada" target="_blank">
                  <i class='bx bxs-location-plus'></i>
                  <span>45 Grenoble Dr, North York, ON M3C 1C4، Canada</span>
                </a>
              </div>
              <div class="contact-item">
                <a href="tel:+14379951819">
                  <i class='bx bx-mobile-alt'></i>
                  <span>+1 (437) 995-1819</span>
                </a>
              </div>
              <div class="contact-item">
                <a href="mailto:info@alshahedhoney.com">
                  <i class='bx bxs-envelope'></i>
                  <span>info@alshahedhoney.com</span>
                </a>
              </div>
              <div class="contact-item">
                <a href="https://alshahedhoney.com" target="_blank">
                  <i class='bx bx-globe'></i>
                  <span>www.alshahedhoney.com</span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Newsletter Section -->
      </div>

      <!-- Footer Bottom -->
      <div class="footer-bottom">
        <div class="container">
          <p class="copyright">
            Copyright by <span>Alshahed</span> With <span>LOVE</span>. All rights reserved.
          </p>
        </div>
      </div>
  </section>

    <!--link to js-->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // User dropdown
      const userIcon = document.querySelector('.user-icon');
      const userDropdown = document.getElementById('userDropdown');
      
      if (userIcon && userDropdown) {
        userIcon.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          if (userDropdown.style.display === 'none') {
            userDropdown.style.display = 'block';
            languageDropdown.style.display = 'none';
          } else {
            userDropdown.style.display = 'none';
          }
        });
      }

      // Language dropdown
      const languageIcon = document.querySelector('.language-icon');
      const languageDropdown = document.getElementById('languageDropdown');
      
      if (languageIcon && languageDropdown) {
        languageIcon.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          if (languageDropdown.style.display === 'none') {
            languageDropdown.style.display = 'block';
            userDropdown.style.display = 'none';
          } else {
            languageDropdown.style.display = 'none';
          }
        });
      }

      // Close dropdowns when clicking outside
      document.addEventListener('click', function(e) {
        if (!userIcon.contains(e.target) && !userDropdown.contains(e.target)) {
          userDropdown.style.display = 'none';
        }
        if (!languageIcon.contains(e.target) && !languageDropdown.contains(e.target)) {
          languageDropdown.style.display = 'none';
        }
      });

      // Mobile menu functionality
      const menuToggle = document.querySelector('[data-nav-toggler]');
      const navbar = document.querySelector('[data-navbar]');
      const overlay = document.querySelector('[data-overlay]');
      const body = document.body;

      if (menuToggle && navbar) {
        menuToggle.addEventListener('click', function() {
          navbar.classList.toggle('active');
          overlay.classList.toggle('active');
          body.classList.toggle('menu-open');
        });
      }

      // Close menu when clicking overlay
      if (overlay) {
        overlay.addEventListener('click', function() {
          navbar.classList.remove('active');
          overlay.classList.remove('active');
          body.classList.remove('menu-open');
        });
      }

      // Close menu when clicking close button
      const closeBtn = document.querySelector('.nav-close-btn');
      if (closeBtn) {
        closeBtn.addEventListener('click', function() {
          navbar.classList.remove('active');
          overlay.classList.remove('active');
          body.classList.remove('menu-open');
        });
      }

      // Close menu when clicking on navigation links
      const navLinks = document.querySelectorAll('.navbar-link');
      navLinks.forEach(link => {
        link.addEventListener('click', function() {
          // Only close menu if it's not a dropdown toggle
          if (!this.hasAttribute('data-dropdown-toggle')) {
            navbar.classList.remove('active');
            overlay.classList.remove('active');
            body.classList.remove('menu-open');
          }
        });
      });

      // Handle window resize
      window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
          navbar.classList.remove('active');
          overlay.classList.remove('active');
          body.classList.remove('menu-open');
        }
      });

      // Initialize Swiper for company images slider
      var companySwiper = new Swiper('.company-swiper', {
        loop: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.company-swiper .swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.company-swiper .swiper-button-next',
          prevEl: '.company-swiper .swiper-button-prev',
        },
        breakpoints: {
          0: { slidesPerView: 1 },
          700: { slidesPerView: 2 },
          1024: { slidesPerView: 3 }
        }
      });
    });
  </script>
</body>
</html>
