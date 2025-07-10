
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
  @include('home.header')
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
        <h4><img class="revial-lift" src="images/bee1-L.png" alt="bee icon" loading="lazy">{{__('messages.why_choose_us')}}</h4>
        <h2>{{__('messages.shopping_with_us')}}</h2>
      </div>
      <div class="features-container">
        <div class="feature-box revial-lift">
          <div class="feature-icon"><i class='bx bx-time-five'></i></div>
          <h3>{{__('messages.always_open')}}</h3>
          <a href="#">{{__('messages.24/7_working')}}</a>
        </div>
        <div class="feature-box">
          <div class="feature-icon">
            <i class='bx bx-lock'></i>
          </div>
          <h3>{{__('messages.payment_secured')}}</h3>
          <span class="secure_mess">
            {{__('messages.secure_payment_message')}}
          </span>
        </div>
        <div class="feature-box revial-right">
          <div class="feature-icon"><i class='bx bxs-phone-call'></i></div>
          <h3>{{__('messages.contact us')}}</h3>
          <a href="http://wa.me/14379951819/">+1 (437) 995-1819</a>
        </div>
      </div>
    </section>
    
    @include('home.footer')

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