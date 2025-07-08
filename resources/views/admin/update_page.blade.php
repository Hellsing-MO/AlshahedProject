<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from freshcart.codescandy.com/dashboard/add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:10:02 GMT -->
<head>
      <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Codescandy" name="author">
      <title>Add Product Dashboard eCommerce HTML Template - FreshCart</title>
      <link href="../assets/libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet" />
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
        @include('admin.header')
         <!-- main -->
         <main class="main-content-wrapper">
            <!-- container -->
            <div class="container">
               <!-- row -->
               <div class="row mb-8">
                  <div class="col-md-12">
                     <div class="d-md-flex justify-content-between align-items-center">
                        <!-- page header -->
                        <div>
                           <h2>Edit Product</h2>
                        </div>
                        <!-- button -->
                        <div>
                           <a href="{{url('view_product')}}" class="btn btn-light">Back to Product</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- row -->
               <div class="row">
                  <div class="col-lg-8 col-12">
                     <!-- card -->
                     <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                           <h4 class="mb-4 h5">Product Information</h4>
                           <div class="row">
                            <form action="{{url('edit_product', $data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                              <!-- input -->
                              <div class="mb-3 col-lg-6">
                                 <label class="form-label">Title</label>
                                 <input type="text" name="title" value="{{$data->title}}" class="form-control" placeholder="Product Name" required />
                              </div>
                              <!-- input -->
                              <div class="mb-3 col-lg-6">
                                 <label class="form-label">Product Category</label>
                                 <select name="category_id" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach ($category as $category)
                                       <option value="{{$category->id}}" {{$data->category_id == $category->id ? 'selected' : ''}}>
                                          {{$category->category_name}}
                                       </option>
                                    @endforeach
                                 </select>
                              </div>
                              <!-- input -->
                              <div class="mb-3 col-lg-6">
                                 <label class="form-label">Price</label>
                                 <input type="text" name="price" value="{{$data->price}}" class="form-control" placeholder="Price" required />
                              </div>
                            <!-- input -->
                              <div class="mb-3 col-lg-6">
                                <label class="form-label">Quantity</label>
                                <input type="text" name="quantity" value="{{$data->quantity}}" class="form-control" placeholder="quantity" required />
                             </div>
                              <!-- input -->
                              <div class="mb-3 col-lg-6">
                                 <label class="form-label">Weight</label>
                                 <select class="form-select" name="Weight" required>
                                    <option selected>Select Weight</option>
                                    <option value="0.1kg" {{$data->Weight == '0.1kg' ? 'selected' : ''}}>0.1kg</option>
                                    <option value="0.25kg" {{$data->Weight == '0.25kg' ? 'selected' : ''}}>0.25kg</option>
                                    <option value="0.5kg" {{$data->Weight == '0.5kg' ? 'selected' : ''}}>0.5kg</option>
                                    <option value="1kg" {{$data->Weight == '1kg' ? 'selected' : ''}}>1kg</option>
                                 </select>
                              </div>
                              <div>
                                 <div class="mb-3 col-lg-12 mt-5">
                                    <div>
                                       <label for="">Current Image</label>
                                       <img height="170" width="170" src="/products/{{$data->image}}" alt="">
                                   </div>
                                    <!-- heading -->
                                    <h4 class="mb-3 h5">New Image</h4>
                                    <!-- input -->
                                    <div id="my-dropzone" class="dropzone mt-4 border-dashed rounded-2 min-h-0">
                                        <input type="file" name="image" >
                                    </div>
                                 </div>
                              </div>
                              <!-- input -->
                              <div class="mb-3 col-lg-12 mt-5">
                                 <label class="form-label">description</label>
                                 <input type="text" name="description" value="{{$data->description}}" class="form-control"  required />
                                 
                              </div>
                              <div class="d-grid">
                                <input href="#" class="btn btn-primary"  type="submit" value="Update Product">
                             </div>
                            </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-12">

                     <!-- button -->

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

      <script src="../assets/libs/quill/dist/quill.min.js"></script>
      <script src="../assets/js/vendors/editor.js"></script>
      <script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
      <script src="../assets/js/vendors/dropzone.js"></script>
   </body>

<!-- Mirrored from freshcart.codescandy.com/dashboard/add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:10:02 GMT -->
</html>
