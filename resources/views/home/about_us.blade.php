
<!DOCTYPE html>
<html lang="{{__('messages.lang')}}" >

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Honey Website Design</title>
  <link rel="stylesheet" href="style.css">

  <!--box icons-->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!--google fonts-->
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
      .about-header {
        position: relative;
        min-height: 70vh;
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Creates the parallax effect */
      }
  
      .about-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.1));
        z-index: 1;
      }
  
      .about-header-content {
        position: relative;
        z-index: 2;
      }
  
      .about-content-wrapper {
        position: relative;
        z-index: 3;
        margin-top: -120px; /* Creates the overlap */
      }
  
      .about-content-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      }
  
      .about-header-title {
        color: #ff9f0d;
        font-size: 5rem; /* Large size for desktop */
        padding-top: 470px;

      }
  
      .about-header-img {
        width: 200px; /* Large size for desktop */
      }
      
      .about-paragraph {
        font-size: 22px;
      }
  
      /* Media query for mobile screens */
      @media (max-width: 768px) {
        .about-header-title {
          font-size: 2.75rem; /* Smaller, friendly size for mobile */
        }
        .about-header-img {
          width: 120px; /* Smaller, friendly size for mobile */
        }
      }
    </style>
</head>

<body class="all">
 <!-- ////////////////
     ***** Navigtion Bar*
    /////////////////////-->
    <header class="header" data-header>
      <div class="container">
  
        <a href="{{url('/')}}" class="logo logo-container">
          <img src="images/logo alshahed.png" width="66px" height="88px" alt="logo">
          <span><span class="al-sh">Al</span>shahed</span>
          <!-- Mobile cart icon next to logo -->
          <a href="{{url('mycart')}}" class="mobile-cart-icon" data-count="{{$count}}">
            <i class='bx bx-cart'></i>
          </a>
          <!-- Mobile WhatsApp icon next to cart -->
          <a href="http://wa.me/14379951819/" class="mobile-whatsapp-icon" target="_blank">
            <i class='bx bxl-whatsapp'></i>
          </a>
        </a>
        <nav class="navbar" data-navbar>
          <div class="wrapper">
            <a href="{{url('/')}}" class="logo logo-container">
              <img src="images/logo alshahed.png" width="66px" height="88px" alt="logo">
              <span><span class="al-sh">Al</span>shahed</span>
            </a>
  
            <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
              {{-- <i class="bx bx-close" aria-hidden="true"></i> --}}
              =
            </button>
          </div>
  
          <ul class="navbar-list">

            <li class="navbar-item">
              <a href="{{url('/')}}" class="navbar-link id-activ" data-nav-link>
                <i class='bx bx-home-alt' style="margin-right: 12px; font-size: 20px;"></i>
                {{__('messages.Home')}}
              </a>
            </li>
  
            <li class="navbar-item">
              <a href="{{url('about_us')}}" class="navbar-link" data-nav-link>
                <i class='bx bx-info-circle' style="margin-right: 12px; font-size: 20px;"></i>
                {{__('messages.about us')}}
              </a>
            </li>
  
            <li class="navbar-item">
              <a href="{{url('our_shop')}}" class="navbar-link" data-nav-link>
                <i class='bx bx-store' style="margin-right: 12px; font-size: 20px;"></i>
                {{__('messages.our shop')}}
              </a>
            </li>

            <li class="navbar-item">
              <a href="#contact" class="navbar-link" data-nav-link>
                <i class='bx bx-phone' style="margin-right: 12px; font-size: 20px;"></i>
                {{__('messages.contact us')}}
              </a>
            </li>


            @php($Languages = ['en' => 'English', 'ar' => 'Arabic', 'fr' => 'France'])
            @if (Route::has('login'))
            @auth
            <div class="nav-icons">
              <a href="{{url('mycart')}}"><i class='bx bx-cart'>[{{$count}}]</i></a>
              <div class="bx bx-menu" id="menu-icon"></div>
            </div>

              <div class="nav-icons flex items-center gap-4">
                <div class="relative">
                  <a href="#" class="user-icon text-sm"><i class='bx bx-user'></i> {{__('messages.Account')}}</a>
                  <div class="absolute right-0 mt-2 w-40 bg-[#FFB800] rounded-md shadow-lg py-1 hidden z-50" id="userDropdown" style="display: none;">
                    <form style="padding: 10px" method="POST" action="{{route('logout')}}">
                      @csrf
                      <a class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                        <input type="submit" value="logout">
                      </a>
                    </form>
                  </div>
                </div>
                <span class="text-gray-400">/</span>
                /
                <div class="relative">
                  <a href="#" class="language-icon text-sm"><i class='bx bx-globe'></i> Language: {{Session::get('locale', 'en')}}</a>
                  <div class="absolute right-0 mt-2 w-40 bg-[#FFB800] rounded-md shadow-lg py-1 hidden z-50" id="languageDropdown" style="display: none;">
                    <a href="{{route('lang.change', ['lang' => 'en'])}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                      <i class='bx bx-globe'></i> English
                    </a>
                    <a href="{{route('lang.change', ['lang' => 'ar'])}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                      <i class='bx bx-globe'></i> العربية
                    </a>
                    <a href="{{route('lang.change', ['lang' => 'fr'])}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                      <i class='bx bx-globe'></i> French
                    </a>
                  </div>
                </div>
              </div>
            @else  
              

            <div class="nav-icons">
              <a href="{{url('mycart')}}"><i class='bx bx-cart nav-cart'>[{{$count}}]</i></a>
              <div class="bx bx-menu" id="menu-icon"></div>
            </div>


            <div class="nav-icons flex items-center gap-4">
              <div class="relative">
                <a href="#" class="user-icon text-sm"><i class='bx bx-user'></i> {{__('messages.Account')}}</a>
                <div class="absolute right-0 mt-2 w-40 bg-[#FFB800] rounded-md shadow-lg py-1 hidden z-50" id="userDropdown" style="display: none;">
                  <a href="{{url('login')}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">{{__('messages.login')}}</a>
                  <a href="{{url('register')}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">{{__('messages.register')}}</a>
                </div>
              </div>
              <span class="text-gray-400">/</span>
              /
              <div class="relative">
                <a href="#" class="language-icon text-sm"><i class='bx bx-globe'></i>  Language: {{Session::get('locale', 'en')}}</a>
                <div class="absolute right-0 mt-2 w-40 bg-[#FFB800] rounded-md shadow-lg py-1 hidden z-50" id="languageDropdown" style="display: none;">
                  <a href="{{route('lang.change', ['lang' => 'en'])}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                    <i class='bx bx-globe'></i> English
                  </a>
                  <a href="{{route('lang.change', ['lang' => 'ar'])}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                    <i class='bx bx-globe'></i> العربية
                  </a>
                  <a href="{{route('lang.change', ['lang' => 'fr'])}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                    <i class='bx bx-globe'></i> French
                  </a>
                </div>
              </div>
            </div>
            @endauth
            @endif
       </ul>
        </nav>
        

        <div class="header-actions">
          <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
            {{-- <i class="bx bx-menu" id="menu-icon"></i> --}}
            =
          </button>
        </div>
        <div class="overlay" data-nav-toggler data-overlay></div>
  </div>
    </header>
    <br>
    <br>
    <br>
    <!--about us-->
<div class="about-us-section">
  <!-- About Us Header -->
  <div class="about-header flex items-center justify-center" style="background-image: url(images/pexels-three-shots-21264-714522.jpg)">
    <div class="about-header-content container mx-auto text-center">
      <div class="flex flex-col items-center revial-top">
        <h2 class="about-header-title font-extrabold tracking-tight">{{__('messages.about us')}}</h2>
      </div>
    </div>
  </div>

  <!-- About Us Content -->
  <section class="about-content-wrapper pb-16" id="about">
    <div class="container mx-auto px-4">
      <div class="about-content-card max-w-4xl mx-auto p-8 sm:p-16">
        <div class="text-center">
          <p style="padding-top: 40px" class="about-paragraph leading-loose max-w-3xl mx-auto mb-12 revial-bottom">
            {{__('messages.about')}}
          </p>
          <a href="{{url('our_shop')}}" class="btn inline-block text-lg py-3 px-8 transform hover:scale-105 transition-transform duration-300 revial-bottom" style="margin-top: 20px">
            {{__('messages.explore')}}
            <i class='bx bxs-right-arrow ml-2'></i>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

    <!--features-->
    <section class="features-section">
      <div class="middle-text revial-top">
        <h4><img class="revial-lift" src="images/bee1-L.png" alt="bee icon" loading="lazy">Why Choose Us</h4>
        <h2>Our Core Features</h2>
      </div>
      <div class="features-container">
        <div class="feature-box revial-lift">
          <div class="feature-icon"><i class='bx bx-time-five'></i></div>
          <h3>Always Open</h3>
          <a href="#">24/7 working</a>
        </div>
        <div class="feature-box">
          <div class="feature-icon"><i class='bx bx-map-pin'></i></div>
          <h3>Our Location</h3>
          <a href="https://maps.app.goo.gl/2bKE2M8vTHJuPdwz9?g_st=awb">North York, Canada</a>
        </div>
        <div class="feature-box revial-right">
          <div class="feature-icon"><i class='bx bxs-phone-call'></i></div>
          <h3>Contact Us</h3>
          <a href="http://wa.me/14379951819/">+1 (437) 995-1819</a>
        </div>
      </div>
    </section>
    
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