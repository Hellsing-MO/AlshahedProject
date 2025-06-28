<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Alshahed Honey</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

  <!--box icons-->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!--google fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    @include('home.header')
    <br>
    <br>
    <br>
    <main class="auth-container">
        <div class="auth-card">
            <h1>{{ __('Register') }}</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" class="form-control mt-1" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" class="form-control mt-1" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" class="form-control mt-1" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <div class="form-group">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" class="form-control mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="primary-btn">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </main>
    <!--contact-->
  <section class="contact" id="contact">
    <div class="contact-text">
      <h2 class="revial-top">{{__('messages.contact us')}}</h2>
     
      <div class="social">
        <a href="https://www.instagram.com/alshahedhoney?igsh=MThka284ZmdsemIxYQ=="><i class='bx bxl-instagram-alt revial-lift'></i></a>
        <a href="https://www.facebook.com/profile.php?id=61560393087783"><i class='bx bxl-facebook revial-top'></i></a>
        <a href="#"><i class='bx bxl-twitter revial-bottom'></i></a>
        <a href="#"><i class='bx bxl-whatsapp revial-bottom'></i></a>
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
              <a href="tel:+256707396740">
                <i class='bx bx-mobile-alt'></i>
                <span>+256707396740</span>
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

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('script.js') }}"></script>
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

  });
</script>
</body>
</html>
