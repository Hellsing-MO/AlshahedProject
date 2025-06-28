<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from freshcart.codescandy.com/dashboard/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:09:13 GMT -->
<head>
      <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Codescandy" name="author">
      <title>Products Dashboard eCommerce HTML Template - FreshCart</title>
      <!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


<!-- Libs CSS -->
<link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="../assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
<link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
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
      <!-- main wrapper-->

      <!-- navbar -->
        @include('admin.header')

         <!-- main -->
         <main class="main-content-wrapper">
            <div class="container">
               <div class="row mb-8">
                  <div class="col-md-12">
                     <!-- page header -->
                     <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                           <h2>Products</h2>
                        </div>
                        <!-- button -->
                        <div>
                           <a href="{{url('add_product')}}" class="btn btn-primary">Add Product</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- row -->
               <div class="row">
                  <div class="col-xl-12 col-12 mb-5">
                     <!-- card -->
                     <div class="card h-100 card-lg">
                        <div class="px-6 py-6">
                           <div class="row justify-content-between">
                              <!-- form -->
                              <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                                 <form action="{{url('product_search')}}" class="d-flex" role="search">
                                    <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search" />
                                    <input type="submit" class="btn btn-secondary" value="Search">
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                           <!-- table -->
                           <div class="table-responsive">
                              <table class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                 <thead class="bg-light">
                                    <tr>
                                       <th>Image</th>
                                       <th>Proudct Name</th>
                                       <th>Category</th>
                                       <th>Description</th>
                                       <th>Price</th>
                                       <th>Quantity</th>
                                       <th>Weight</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($product as $products)
                                    <tr>
                                       <td>
                                          <a href="#!"><img src="products/{{$products->image}}" alt="" class="icon-shape icon-md" /></a>
                                       </td>
                                       <td><a href="#" class="text-reset">{{$products->title}}</a></td>
                                       <td>{{$products->category_name}}</td>
                                       <td>{!!Str::limit($products->description,50)!!}</td>
                                       <td>{{$products->price}}</td>
                                       <td>{{$products->quantity}}</td>
                                       <td>{{$products->Weight}}</td>
                                       <td>
                                          <div class="dropdown">
                                             <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-icon icon-more-vertical fs-5"></i>
                                             </a>
                                             <ul class="dropdown-menu">
                                                <li>
                                                   <a class="dropdown-item" href="{{url('delete_product', $products->id)}}">
                                                      <i class="bi bi-trash me-3"></i>
                                                      Delete
                                                   </a>
                                                </li>
                                                <li>
                                                   <a class="dropdown-item" href="{{url('update_product', $products->id)}}" >
                                                      <i class="bi bi-pencil-square me-3"></i>
                                                      Edit
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                           <nav class="mt-2 mt-md-0">
                              <ul class="pagination mb-0">
                                 {{$product->links()}}
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </main>
      </div>

      <!-- Libs JS -->
<!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>

   </body>

<!-- Mirrored from freshcart.codescandy.com/dashboard/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:09:13 GMT -->
</html>
