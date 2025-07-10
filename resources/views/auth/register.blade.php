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
            <h1>{{ __('messages.register') }}</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <div class="form-group">
                    <label for="name">{{ __('messages.Name') }}</label>
                    <input id="name" class="form-control mt-1" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <div class="form-group">
                    <label for="email">{{ __('messages.Email') }}</label>
                    <input id="email" class="form-control mt-1" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="form-group">
                    <label for="password">{{ __('messages.Password') }}</label>
                    <input id="password" class="form-control mt-1" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <div class="form-group">
                    <label for="password_confirmation">{{ __('messages.Confirm Password') }}</label>
                    <input id="password_confirmation" class="form-control mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('messages.Already registered?') }}
                    </a>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="primary-btn">
                        {{ __('messages.register') }}
                    </button>
                </div>
            </form>
        </div>
    </main>

    @include('home.footer')

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
