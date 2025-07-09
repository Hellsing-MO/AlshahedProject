<!DOCTYPE html>
<html lang="en">


<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta content="Codescandy" name="author" />
   <title>Shop page</title>
   <link href="{{asset('../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet')}}" />
   <link href="{{asset('../assets/libs/nouislider/dist/nouislider.min.css" rel="stylesheet')}}" />
   <!-- Favicon icon-->
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('../assets/images/favicon/favicon.ico')}}" />
   <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

   <!-- Libs CSS -->
   <link href="{{asset('../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet')}}" />
   <link href="{{asset('../assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet')}}" />
   <link href="{{asset('../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet')}}" />

   <!-- Theme CSS -->
   <link rel="stylesheet" href="{{asset('style.css')}}">
   <link rel="stylesheet" href="{{asset('../assets/css/theme.min.css')}}" />


   <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
         dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "G-M8S4MT3EYG");
   </script>
   <script type="text/javascript">
      (function (c, l, a, r, i, t, y) {
         c[a] =
            c[a] ||
            function () {
               (c[a].q = c[a].q || []).push(arguments);
            };
         t = l.createElement(r);
         t.async = 1;
         t.src = "https://www.clarity.ms/tag/" + i;
         y = l.getElementsByTagName(r)[0];
         y.parentNode.insertBefore(t, y);
      })(window, document, "clarity", "script", "kuc8w5o9nt");
   </script>
</head>

<body class="shop">
   @extends('home.header')
      <!-- Modal -->

      <script src="../assets/js/vendors/validation.js"></script>
      <br>
      <br>
      <main>
         <!-- section-->
         <!-- section -->
         <div class="mt-8 mb-lg-14 mb-8 has-bg-image" id="image-bg">
            <!-- container -->
            <div class="container">
               <!-- row -->
               <div class="row gx-10">
                  <!-- col -->
                  <aside class="shop-aside col-lg-3 col-md-4 mb-6 mb-md-0">
                     <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50 offcanvas-category-mobile" tabindex="-1"
                        id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">
                        <div class="offcanvas-header d-lg-none flex-column align-items-center p-2">
                          <div class="offcanvas-drag-handle mb-2"></div>
                          <div class="d-flex w-100 align-items-center justify-content-between">
                            <h5 class="offcanvas-title mb-0" id="offcanvasCategoryLabel" style="color: #ff9f0d; font-size: 1.2rem;">Categories</h5>
                            <button type="button" class="btn btn-link text-dark d-flex align-items-center fs-5" data-bs-dismiss="offcanvas" aria-label="Close" style="font-size: 1.2rem;">
                              <i class='bx bx-x' style="font-size: 2rem;"></i>
                            </button>
                          </div>
                        </div>
                        <div class="offcanvas-body ps-lg-2 pt-lg-0">
                           <div class="mb-8">
                              <!-- title -->
                              <!-- nav -->
                              @php
                                  $locale = app()->getLocale();
                              @endphp
                              <ul class="nav nav-category" id="categoryCollapseMenu">
                                 <li class="nav-item border-bottom w-100">
                                   <a href="#" class="nav-link category-link d-flex align-items-center"
                                      data-category-id="all"
                                      data-category-name="{{ __('messages.all pro') }}">
                                      {{ __('messages.all pro') }}
                                   </a>
                                 </li>
                                 @foreach ($category as $cat)
                                   <li class="nav-item border-bottom w-100">
                                    <a href="#" class="nav-link category-link d-flex align-items-center"
                                    data-category-id="{{$cat->id}}"
                                    data-category-name="{{ $cat->getTranslated('category_name') }}">
                                      {{ $cat->getTranslated('category_name') }}
                                    </a>
                                   </li>
                                 @endforeach
                              </ul>
                           </div>

                        </div>
                     </div>
                  </aside>
                  <section class="shop-box col-lg-9 col-md-12">
                     <!-- card -->
                     <div class="card mb-4 bg-light border-0">
                        <!-- card body -->
                        <div class="card-body-1 card-body p-9">
                           <h2 class="mb-0 fs-1 h2-header-bee">
                              <img class="beenice1" src="{{asset('images/beenice1.png')}}">
                              <span id="selected-category" style="color: #222">
                                 {{ isset($selected_category) ? $selected_category->getTranslated('category_name') : __('messages.all pro') }}
                               </span>
                           </h2>
                        </div>
                     </div>
                     <!-- list icon -->
                     <div class="d-lg-flex justify-content-between align-items-center">
                        <!-- icon -->
                        <div class="d-md-flex justify-content-between align-items-center">
                           <div class="d-flex align-items-center justify-content-between">
                              <div class="ms-2 d-lg-none">
                                 <a class="btn btn-outline-warning text-dark d-flex align-items-center" data-bs-toggle="offcanvas"
                                    href="#offcanvasCategory" role="button" aria-controls="offcanvasCategory">
                                    <i class='bx bx-category' style="font-size: 18px; margin-right: 6px;"></i>
                                    Categories
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div id="product-list" class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                        @foreach ($product as $products)
                     <!-- col -->
                     <div class="col">
                        <!-- card -->
                        <div class="card card-product">
                          <div class="card-body">
                            <!-- badge -->
                            <div class="text-center position-relative">
                              <div class="position-absolute top-0 start-0">
                                 <span class="badge bg-danger">Sale</span>
                              </div>
                              <a href="{{url('product_details', $products->id)}}">
                                 <!-- img -->
                                 <img src="{{asset('products/' . $products->image)}}"
                                   alt="{{$products->title}}" 
                                   class="mb-3 img-fluid" 
                                   loading="lazy"
                                   onerror="this.style.display='none'"
                                   onload="this.style.animation='none'; this.style.background='none';" />
                              </a>
                            </div>
                            <!-- heading -->

                            <h2 class="fs-6"><a href="shop-single.html"
                                 class="text-inherit text-decoration-none">{{$products->getTranslated('title')}}</a></h2>
                            <div>
                              <!-- rating -->
                              <small class="text-warning">
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-half"></i>
                              </small>
                              <span class="text-muted small">4.5</span>
                            </div>
                            <!-- price -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                              <div>
                                 <span class="text-dark">${{$products->price}}</span>
                              </div>
                              <!-- btn -->
                              <div>
                                 <a href="{{url('add_cart', $products->id)}}" class="btn btn-primary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"
                                      class="feather feather-plus">
                                      <line x1="12" y1="5" x2="12" y2="19"></line>
                                      <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    Add
                                 </a>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
                  @endforeach
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </main>

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
          <span style="font-size: 1rem;">
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
    
      @extends('home.footer')

      <!-- modal -->

      <script src="{{asset('../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('../assets/libs/simplebar/dist/simplebar.min.js')}}"></script>
      <script>
         document.addEventListener('DOMContentLoaded', function() {
           // User dropdown
           const userIcon = document.querySelector('.user-icon');
           const userDropdown = document.getElementById('userDropdown');
           const languageIcon = document.querySelector('.language-icon');
           const languageDropdown = document.getElementById('languageDropdown');
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
           document.addEventListener('click', function(e) {
             if (!userIcon.contains(e.target) && !userDropdown.contains(e.target)) {
               userDropdown.style.display = 'none';
             }
             if (!languageIcon.contains(e.target) && !languageDropdown.contains(e.target)) {
               languageDropdown.style.display = 'none';
             }
           });
           // Mobile menu functionality
           const menuToggles = document.querySelectorAll('[data-nav-toggler]');
           const navbar = document.querySelector('[data-navbar]');
           const overlay = document.querySelector('[data-overlay]');
           const body = document.body;
           menuToggles.forEach(menuToggle => {
             menuToggle.addEventListener('click', function() {
               navbar.classList.toggle('active');
               overlay.classList.toggle('active');
               body.classList.toggle('menu-open');
             });
           });
           if (overlay) {
             overlay.addEventListener('click', function() {
               navbar.classList.remove('active');
               overlay.classList.remove('active');
               body.classList.remove('menu-open');
             });
           }
           const closeBtn = document.querySelector('.nav-close-btn');
           if (closeBtn) {
             closeBtn.addEventListener('click', function() {
               navbar.classList.remove('active');
               overlay.classList.remove('active');
               body.classList.remove('menu-open');
             });
           }
           const navLinks = document.querySelectorAll('.navbar-link1');
           navLinks.forEach(link => {
             link.addEventListener('click', function() {
               if (!this.hasAttribute('data-dropdown-toggle')) {
                 navbar.classList.remove('active');
                 overlay.classList.remove('active');
                 body.classList.remove('menu-open');
               }
             });
           });
           window.addEventListener('resize', function() {
             if (window.innerWidth > 768) {
               navbar.classList.remove('active');
               overlay.classList.remove('active');
               body.classList.remove('menu-open');
             }
           });
         });
         document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.category-link').forEach(function(link) {
               link.addEventListener('click', function(e) {
                  e.preventDefault();
                  var categoryId = this.getAttribute('data-category-id');
                  var categoryName = this.getAttribute('data-category-name');
                  document.getElementById('selected-category').textContent = categoryName;

                  let url = (categoryId === 'all')
                  ? '/api/products/all'
                  : '/api/products/category/' + categoryId;

                  fetch(url)
                  .then(response => response.json())
                  .then(products => {
                     let html = '';
                     products.forEach(product => {
                        html += `
                        <div class="col">
                           <div class="card card-product">
                              <div class="card-body">
                              <div class="text-center position-relative">
                                 <div class="position-absolute top-0 start-0">
                                    <span class="badge bg-danger">Sale</span>
                                 </div>
                                 <a href="/product_details/${product.id}">
                                    <img src="/products/${product.image}" 
                                         alt="${product.title}" 
                                         class="mb-3 img-fluid" 
                                         loading="lazy"
                                         onerror="this.style.display='none'"
                                         onload="this.style.animation='none'; this.style.background='none';" />
                                 </a>
                              </div>
                              <h2 class="fs-6"><a href="/product_details/${product.id}" class="text-inherit text-decoration-none">${product.title}</a></h2>
                              <div>
                                 <!-- rating -->
                                 <small class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                 </small>
                                 <span class="text-muted small">4.5</span>
                              </div>
                           
                            <div class="d-flex justify-content-between align-items-center mt-3">
                              <div>
                                 <span class="text-dark">$${product.price}</span>
                              </div>
                              <!-- btn -->
                              <div>
                                 <a href="/add_cart/${product.id}" class="btn btn-primary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"
                                      class="feather feather-plus">
                                      <line x1="12" y1="5" x2="12" y2="19"></line>
                                      <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    Add
                                 </a>
                              </div>
                           </div>

                           </div>
                           </div>
                        </div>
                     </div>   
                        `;
                     });
                     document.getElementById('product-list').innerHTML = html;
                     history.pushState(null, '', '/category/' + categoryId);
                  });
               });
            });
         });
      </script>

      <!-- Theme JS -->
      <script src="{{asset('../assets/js/theme.min.js')}}"></script>

</body>


</html>