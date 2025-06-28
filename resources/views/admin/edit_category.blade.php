<!DOCTYPE html>
<html lang="en">
    @include('admin.css')
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
							   <h2>Add New Category</h2>
							   <!-- breacrumb -->
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="row">
					  <div class="col-lg-12 col-12">
						 <!-- card -->
						 <div class="card mb-6 shadow border-0">
							<!-- card body -->
							<div class="card-body p-6">
							   <h4 class="mb-4 h5 mt-5">Category Information</h4>
	
							   <div class="row">
								  <!-- input -->
								  <form action="{{url('update_category', $data)}}" method="POST">
									@csrf
									<div class="mb-3 col-lg-6">
										<label class="form-label">Category Name</label>
										<input value="{{$data->category_name}}" type="text" name="category" class="form-control" placeholder="Category New Name" required />
									</div>
									<div class="col-lg-12">
										<input type="submit" class="btn btn-primary" value="Update Categoey">
									 </div>
								  </form>

							   </div>

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

<!-- Mirrored from freshcart.codescandy.com/dashboard/categories.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:09:16 GMT -->
</html>
