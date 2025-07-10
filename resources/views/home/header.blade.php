<!-- ////////////////
     ***** Navigtion Bar*
    /////////////////////-->
    <header class="header" data-header>
        <div class="container">
    
          <a href="{{url('/')}}" class="logo logo-container">
            <img src="{{asset('images/logo alshahed.png')}}" width="66px" height="88px" alt="logo">
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
                <img src="{{asset('images/logo alshahed.png')}}" width="66px" height="88px" alt="logo">
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
                          <input type="submit" value="{{ __('messages.logout') }}">
                        </a>
                      </form>
                      <a href="{{ route('orders.index') }}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                        {{ __('messages.my_orders') }}
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