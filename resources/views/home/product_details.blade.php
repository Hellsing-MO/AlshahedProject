<!DOCTYPE html>
<html lang="en">
   
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta content="Codescandy" name="author" />
      <title>Shop Single </title>
      <link href="../assets/libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet" />
      <link href="../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet" />

      <!-- Favicon icon-->
      <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico" />
      <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

      <!-- Libs CSS -->
      <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
      <link href="../assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet" />
      <link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />

      <!-- Theme CSS -->
      <link rel="stylesheet" href="../style.css">
      <link rel="stylesheet" href="../assets/css/theme.min.css" />
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

   <body>
       <!-- ////////////////
             ***** Navigtion Bar*
            /////////////////////-->
            @extends('home.header')
            <br>
            <br>
            <br>
            <br>
      <!-- Modal -->


      <script src="../assets/js/vendors/validation.js"></script>

      <main>

         <section class="mt-8 product-details-section">
            <div class="container">
               <div class="row">
                  <div class="col-md-5 col-xl-6">
                     <!-- img slide -->
                     <div class="product" id="product">
                           <!-- img -->
                           <!-- img -->
                           <img class="product-details-main-img" 
                                src="/products/{{$data->image}}" 
                                alt="{{$data->title}}" 
                                loading="lazy"
                                onerror="this.style.display='none'"
                                onload="this.style.animation='none'; this.style.background='none';" />
                     </div>
                     <!-- product tools -->
                  </div>
                  <div class="col-md-7 col-xl-6">
                     <div class="ps-lg-10 mt-6 mt-md-0">
                        <br>
                        <br>
                        <!-- content -->
                        <h4 href="#!" class="mb-4 d-block">Weight : {{$data->Weight}}</h4>
                        <!-- heading -->
                        <h1 class="mb-1">{{$data->getTranslated('title')}}</h1>
                        <div class="mb-4">
                           <!-- rating -->
                           <!-- rating -->
                           <small class="text-warning">
                              <i class="bi bi-star-fill"></i>
                              <i class="bi bi-star-fill"></i>
                              <i class="bi bi-star-fill"></i>
                              <i class="bi bi-star-fill"></i>
                              <i class="bi bi-star-half"></i>
                           </small>
                           <a href="#" class="ms-2">(30 reviews)</a>
                        </div>
                        <div class="fs-4">
                           <!-- price -->
                           <span class="fw-bold text-dark">${{$data->price}}</span>
                           <span><small class="fs-6 ms-2 text-danger">26% Off</small></span>
                        </div>
                        <!-- hr -->
                        <hr class="my-6" />
                        <div class="mb-5">
                           <h3>Description:</h3>
                           <p  style="font-size: 20px">{{$data->getTranslated('description')}}</p>
                        </div>

                        <div class="mt-3 row justify-content-start g-2 align-items-center">
                           <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                              <!-- button -->
                              <!-- btn -->
                              <a href="{{url('add_cart', $data->id)}}" class="btn btn-primary">
                                 <i class="feather-icon icon-shopping-bag me-2"></i>
                                 Add to cart
                              </a>
                           </div>
                        </div>
                        <!-- hr -->
                        <hr class="my-6" />
                        <div class="mt-8">
                           <!-- dropdown -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>


         <!-- section -->
         <section class="my-lg-14 my-14 related-products-section">
            <div class="container">
               <!-- row -->
               <div class="row">
                  <div class="col-12">
                     <!-- heading -->
                     <h3>Related Items</h3>
                  </div>
               </div>
               <!-- row -->
               <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-2 mt-2">
                  <!-- col -->
                  @foreach ($product as $products)
                     
                  <div class="col">
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
                           <div class="text-small mb-1">
                              <a href="#" class="text-decoration-none text-muted"><small>{{$products->getTranslated('category')}}</small></a>
                           </div>
                           <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">{{$products->getTranslated('title')}}</a></h2>
                           <div>
                              <!-- rating -->
                              <small class="text-warning">
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-fill"></i>
                                 <i class="bi bi-star-half"></i>
                              </small>
                           </div>
                           <!-- price -->
                           <div class="d-flex justify-content-between align-items-center mt-3">
                              <div>
                                 <span class="text-dark">${{$products->price}}</span>
                              </div>
                              <!-- btn -->
                              <div>
                                 <a href="#!" class="btn btn-primary btn-sm">
                                    <svg
                                       xmlns="http://www.w3.org/2000/svg"
                                       width="16" height="16"
                                       viewBox="0 0 24 24"
                                       fill="none"
                                       stroke="currentColor"
                                       stroke-width="2"
                                       stroke-linecap="round"
                                       stroke-linejoin="round"
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

                  <!-- col -->
               </div>
            </div>
         </section>
      </main>
      <!-- Footer -->
      <!-- footer -->


    
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

      <!-- Javascript-->
      <script src="../assets/libs/rater-js/index.js"></script>
      <script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
      <!-- Libs JS -->
      <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
      <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

      <!-- Theme JS -->
      <script src="../assets/js/theme.min.js"></script>

      <script src="../assets/js/vendors/jquery.min.js"></script>
      <script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
      <script src="../assets/js/vendors/tns-slider.js"></script>
      <script src="../assets/js/vendors/zoom.js"></script>
      <script src="../assets/js/vendors/dropzone.js"></script>
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
       </script>
   </body>

</html>
