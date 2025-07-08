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
                    <a href="{{ route('orders.index') }}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                      My Orders
                    </a>
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
  <!--home-->
  <section class="home has-bg-image" id="home" style="background-image: url(images/Vector\ Smart\ Object\ 2.png);">
    <div class="bee bee1"></div>
    <div class="bee bee2"></div>
    <div class="bee-right bee3"></div>

    <div class="home-text revial-lift">
      <h1>{{__('messages.intro')}}</h1>
      <a href="{{url('our_shop')}}" class="btn">{{__('messages.explore')}}<i class='bx bxs-right-arrow'></i></a>
    </div>

    <div class="home-img revial-right" style="padding-top: 45px">
      <img src="images/hero.png"  loading="lazy">
    </div>
    <div class="scroll-down revial-top"></div>
  </section>

  <!-- Company Images Slider Section -->
  <section class="company-slider-section">
    <div class="company-slider-title text-center">
    </div>
    <div class="swiper company-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="{{asset('images/dark-coffee-beans-bowl-brown-table.jpg')}}" alt="Company Image 1" loading="lazy"></div>
        <div class="swiper-slide"><img src="{{asset('images/top-view-assortment-dried-fruits-black-yellow-raisins.jpg')}}" alt="Company Image 2" loading="lazy"></div>
        <div class="swiper-slide"><img src="{{asset('images/top-view-brown-almonds.jpg')}}" alt="Company Image 3" loading="lazy"></div>
        <div class="swiper-slide"><img src="{{asset('images/wooden-honey-dipper-with-honeycomb-beeswax.jpg')}}" alt="Company Image 4" loading="lazy"></div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
      <!-- Add Navigation -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>

  <!-- Store Categories Section -->
  <section class="store-categories-section">
    <div class="middle-text revial-top">
      <h4>
        <img class="revial-lift" src="images/bee1-L.png" alt="bee icon" loading="lazy">
        {{ __('messages.store_categories') ?? 'Store Categories' }}
      </h4>
      <h2>{{ __('messages.choose_category') ?? 'Choose Your Category' }}</h2>
    </div>
    <div class="categories-container">
      <div class="category-box revial-lift">
        <a href="{{ url('our_shop') }}">
          <img src="{{asset('images/honey-category.jpg')}}"  alt="Honey" loading="lazy" class="category-img">
          <h3>قسم العسل</h3>
        </a>
      </div>
      <div class="category-box revial-top">
        <a href="{{ url('category/22') }}">
          <img src="{{asset('images/nuts-category.jpg')}}"  alt="Nuts" loading="lazy" class="category-img">
          <h3>قسم البن, الزبيب واللوز اليمني</h3>
        </a>
      </div>
      <div class="category-box revial-right">
        <a href="{{ url('category/23') }}">
          <img src="{{asset('images/other-category.jpg')}}"  alt="Dried Fruits" loading="lazy" class="category-img">
          <h3 style="font-size: 15px">اقسام اخرى(القسط الهندي, العكبر, قشر الرمان, حبوب اللقاح, لبان الذكر)</h3>
        </a>
      </div>
    </div>
  </section>

  <!--Our shop-->
  <section class="shop" id="shop"">
    <div class="middle-text revial-top">
      <h4><img class="revial-lift" src="images/bee1-L.png" alt="bee icon" loading="lazy">{{__('messages.our shop')}}</h4>
      <h2>{{__('messages.shop int')}}</h2>
    </div>
    <div class="shop-content">
      @foreach ($product as $products)
        
      <div class="row1 revial-lift">
        <a href="{{url('product_details', $products->id)}}">
          <img src="products/{{$products->image}}" loading="lazy">
        </a>
        <br>
        <br>
        <h3>{{ $products->getTranslated('title') }}</h3>
        <p>{!! Str::limit($products->getTranslated('description'), 50) !!}</p>
        <div class="in-text">
          <div class="price">
            <h6>${{$products->price}}</h6>
          </div>
          <div class="s-btnn">
            <a href="{{url('add_cart', $products->id)}}">
              <i class='bx bx-cart'></i> {{__('messages.add cart')}}
            </a>
          </div>
        </div>

      </div>

      @endforeach


  </section>
  <div class="text-center">
    <a href="{{url('our_shop')}}" class="btn">{{__('messages.all pro')}}<i class='bx bxs-right-arrow'></i></a>
  </div>


  
  <!---reviews-->
  <section class="review mySwiper" id="review">
    <div class="middle-text revial-top">
      <h4><img class="revial-lift" src="images/bee1-L.png" alt="bee icon" loading="lazy">{{__('messages.Our Customer')}}</h4>
      <h2>{{__('messages.clients')}}</h2>
    </div>
    <div class="swiper-wrapper revial-bottom">
      <article class="box swiper-slide" style="background: #fffbe6; border-radius: 18px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); border: 1px solid #ffe0a3;">
        <p style="color: #b8860b; font-size: 1.1rem;">{{__('messages.review1')}}</p>
        <div class="in-box">
          <div class="bx-img">
            <img src="https://www.svgrepo.com/show/452030/avatar-default.svg" alt="Anonymous User" loading="lazy" style="border-radius: 50%; border: 2px solid #ffb800; background: #fff; width: 70px; height: 70px;">
          </div>
          <div class="bxx-text">
            <h4>Alex Morgan</h4>
          </div>
          <div class="ratings">
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
          </div>
        </div>
      </article>

      <article class="box swiper-slide" style="background: #fffbe6; border-radius: 18px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); border: 1px solid #ffe0a3;">
        <p style="color: #b8860b; font-size: 1.1rem;">{{__('messages.review2')}}</p>
        <div class="in-box">
          <div class="bx-img">
            <img src="https://www.svgrepo.com/show/452030/avatar-default.svg" alt="Anonymous User" loading="lazy" style="border-radius: 50%; border: 2px solid #ffb800; background: #fff; width: 70px; height: 70px;">
          </div>
          <div class="bxx-text">
            <h4>Jamie Lee</h4>
          </div>
          <div class="ratings">
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
          </div>
        </div>
      </article>

      <article class="box swiper-slide" style="background: #fffbe6; border-radius: 18px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); border: 1px solid #ffe0a3;">
        <p style="color: #b8860b; font-size: 1.1rem;">{{__('messages.review3')}}</p>
        <div class="in-box">
          <div class="bx-img">
            <img src="https://www.svgrepo.com/show/452030/avatar-default.svg" alt="Anonymous User" loading="lazy" style="border-radius: 50%; border: 2px solid #ffb800; background: #fff; width: 70px; height: 70px;">
          </div>
          <div class="bxx-text">
            <h4>Samira Patel</h4>
          </div>
          <div class="ratings">
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
          </div>
        </div>
      </article>

      <article class="box swiper-slide" style="background: #fffbe6; border-radius: 18px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); border: 1px solid #ffe0a3;">
        <p style="color: #b8860b; font-size: 1.1rem;">{{__('messages.review4')}}</p>
        <div class="in-box">
          <div class="bx-img">
            <img src="https://www.svgrepo.com/show/452030/avatar-default.svg" alt="Anonymous User" loading="lazy" style="border-radius: 50%; border: 2px solid #ffb800; background: #fff; width: 70px; height: 70px;">
          </div>
          <div class="bxx-text">
            <h4>Diego Rossi</h4>
          </div>
          <div class="ratings">
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
          </div>
        </div>
      </article>

    </div>
  </section>

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