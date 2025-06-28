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
      <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
               <div class="modal-header border-0">
                  <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign Up</h5>

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form class="needs-validation" novalidate>
                     <div class="mb-3">
                        <label for="fullName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter Your Name" required />
                        <div class="invalid-feedback">Please enter name.</div>
                     </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email address" required />
                        <div class="invalid-feedback">Please enter email.</div>
                     </div>
                     <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" required />
                        <div class="invalid-feedback">Please enter password.</div>
                        <small class="form-text">
                           By Signup, you agree to our
                           <a href="#!">Terms of Service</a>
                           &
                           <a href="#!">Privacy Policy</a>
                        </small>
                     </div>

                     <button type="submit" class="btn btn-primary" type="submit">Sign Up</button>
                  </form>
               </div>
               <div class="modal-footer border-0 justify-content-center">
                  Already have an account?
                  <a href="#">Sign in</a>
               </div>
            </div>
         </div>
      </div>

      <!-- Shop Cart -->

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header border-bottom">
            <div class="text-start">
               <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
               <small>Location in 382480</small>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
            <div>
               <!-- alert -->
               <div class="alert alert-danger p-2" role="alert">
                  You've got FREE delivery. Start
                  <a href="#!" class="alert-link">checkout now!</a>
               </div>
               <ul class="list-group list-group-flush">
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0 border-top">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="../assets/images/products/product-img-1.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <!-- title -->
                                 <a href="shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">Haldiram's Sev Bhujia</h6>
                                 </a>
                                 <span><small class="text-muted">.98 / lb</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold">$5.00</span>
                        </div>
                     </div>
                  </li>
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="../assets/images/products/product-img-2.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <a href="shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">NutriChoice Digestive</h6>
                                 </a>
                                 <span><small class="text-muted">250g</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold text-danger">$20.00</span>
                           <div class="text-decoration-line-through text-muted small">$26.00</div>
                        </div>
                     </div>
                  </li>
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="../assets/images/products/product-img-3.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <!-- title -->
                                 <a href="shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">Cadbury 5 Star Chocolate</h6>
                                 </a>
                                 <span><small class="text-muted">1 kg</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold">$15.00</span>
                           <div class="text-decoration-line-through text-muted small">$20.00</div>
                        </div>
                     </div>
                  </li>
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="../assets/images/products/product-img-4.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <!-- title -->
                                 <!-- title -->
                                 <a href="shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">Onion Flavour Potato</h6>
                                 </a>
                                 <span><small class="text-muted">250g</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold">$15.00</span>
                           <div class="text-decoration-line-through text-muted small">$20.00</div>
                        </div>
                     </div>
                  </li>
                  <!-- list group -->
                  <li class="list-group-item py-3 ps-0 border-bottom">
                     <!-- row -->
                     <div class="row align-items-center">
                        <div class="col-6 col-md-6 col-lg-7">
                           <div class="d-flex">
                              <img src="../assets/images/products/product-img-5.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
                              <div class="ms-3">
                                 <!-- title -->
                                 <a href="shop-single.html" class="text-inherit">
                                    <h6 class="mb-0">Salted Instant Popcorn</h6>
                                 </a>
                                 <span><small class="text-muted">100g</small></span>
                                 <!-- text -->
                                 <div class="mt-2 small lh-1">
                                    <a href="#!" class="text-decoration-none text-inherit">
                                       <span class="me-1 align-text-bottom">
                                          <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             width="14"
                                             height="14"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-trash-2 text-success">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </span>
                                       <span class="text-muted">Remove</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- input group -->
                        <div class="col-4 col-md-3 col-lg-3">
                           <!-- input -->
                           <!-- input -->
                           <div class="input-group input-spinner">
                              <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                              <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                              <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                           </div>
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                           <span class="fw-bold">$15.00</span>
                           <div class="text-decoration-line-through text-muted small">$25.00</div>
                        </div>
                     </div>
                  </li>
               </ul>
               <!-- btn -->
               <div class="d-flex justify-content-between mt-4">
                  <a href="#!" class="btn btn-primary">Continue Shopping</a>
                  <a href="#!" class="btn btn-dark">Update Cart</a>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body p-6">
                  <div class="d-flex justify-content-between align-items-start">
                     <div>
                        <h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
                        <p class="mb-0 small">Enter your address and we will specify the offer you area.</p>
                     </div>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="my-5">
                     <input type="search" class="form-control" placeholder="Search your area" />
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-2">
                     <h6 class="mb-0">Select Location</h6>
                     <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Clear All</a>
                  </div>
                  <div>
                     <div data-simplebar style="height: 300px">
                        <div class="list-group list-group-flush">
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
                              <span>Alabama</span>
                              <span>Min:$20</span>
                           </a>
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Alaska</span>
                              <span>Min:$30</span>
                           </a>
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Arizona</span>
                              <span>Min:$50</span>
                           </a>
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>California</span>
                              <span>Min:$29</span>
                           </a>
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Colorado</span>
                              <span>Min:$80</span>
                           </a>
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Florida</span>
                              <span>Min:$90</span>
                           </a>
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Arizona</span>
                              <span>Min:$50</span>
                           </a>
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>California</span>
                              <span>Min:$29</span>
                           </a>
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Colorado</span>
                              <span>Min:$80</span>
                           </a>
                           <a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                              <span>Florida</span>
                              <span>Min:$90</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

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
                        <h1 class="mb-1">{{$data->title}}</h1>
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
                           <p>{{$data->description}}</p>
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
                           <div class="col-md-4 col-4">
                              <!-- btn -->
                              <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                              <a class="btn btn-light" href="shop-wishlist.html" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
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
                              <a href="#!" class="text-decoration-none text-muted"><small>{{$products->category}}</small></a>
                           </div>
                           <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{$products->title}}</a></h2>
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
 
      <!-- modal -->
      <!-- Modal -->
      <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body p-8">
                  <div class="position-absolute top-0 end-0 me-3 mt-3">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <!-- img slide -->
                        <div class="product productModal" id="productModal">
                           <div class="zoom" onmousemove="zoom(event)" style="background-image: url(../assets/images/products/product-single-img-1.jpg)">
                              <!-- img -->
                              <img src="../assets/images/products/product-single-img-1.jpg" alt="" />
                           </div>

                        </div>
                        <!-- product tools -->
                     </div>
                     <div class="col-lg-6">
                        <div class="ps-lg-8 mt-6 mt-lg-0">
                           <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
                           <h2 class="mb-1 h1">Napolitanke Ljesnjak</h2>
                           <div class="mb-4">
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
                              <span class="fw-bold text-dark">$32</span>
                              <span class="text-decoration-line-through text-muted">$35</span>
                              <span><small class="fs-6 ms-2 text-danger">26% Off</small></span>
                           </div>
                           <hr class="my-6" />
                           <div class="mb-4">
                              <button type="button" class="btn btn-outline-secondary">250g</button>
                              <button type="button" class="btn btn-outline-secondary">500g</button>
                              <button type="button" class="btn btn-outline-secondary">1kg</button>
                           </div>
                           <div>
                              <!-- input -->
                              <!-- input -->
                              <div class="input-group input-spinner">
                                 <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                                 <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
                                 <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                              </div>
                           </div>
                           <div class="mt-3 row justify-content-start g-2 align-items-center">
                              <div class="col-lg-4 col-md-5 col-6 d-grid">
                                 <!-- button -->
                                 <!-- btn -->
                                 <button type="button" class="btn btn-primary">
                                    <i class="feather-icon icon-shopping-bag me-2"></i>
                                    <a href="{{url('add_cart')}}">Add to cart</a>
                                 </button>     
                              </div>
                              <div class="col-md-4 col-5">
                                 <!-- btn -->
                                 <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                 <a class="btn btn-light" href="#!" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
                              </div>
                           </div>
                           <hr class="my-6" />
                           <div>
                              <table class="table table-borderless">
                                 <tbody>
                                    <tr>
                                       <td>Product Code:</td>
                                       <td>FBB00255</td>
                                    </tr>
                                    <tr>
                                       <td>Availability:</td>
                                       <td>In Stock</td>
                                    </tr>
                                    <tr>
                                       <td>Type:</td>
                                       <td>Fruits</td>
                                    </tr>
                                    <tr>
                                       <td>Shipping:</td>
                                       <td>
                                          <small>
                                             01 day shipping.
                                             <span class="text-muted">( Free pickup today)</span>
                                          </small>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

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
