
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('style.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>
<body>
  @include('home.header')
  <br>
  <br>
  <br>
  <br>
  <br>
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
