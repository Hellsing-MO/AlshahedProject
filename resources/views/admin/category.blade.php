<!DOCTYPE html>
<html lang="en">
	
	@include('admin.css')
	</head>

	<body>
		@include('admin.header')
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
								  <form action="{{url('add_category')}}" method="POST">
									@csrf
									<div class="mb-3 col-lg-6">
										<label class="form-label">Category Name</label>
										<input type="text" name="category" class="form-control" placeholder="Category Name" required />
									</div>
									<div class="col-lg-12">
										<input type="submit" class="btn btn-primary" value="Create Categoey">
									 </div>
								  </form>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
			 </main>
			<main class="main-content-wrapper">
				<div class="container">
					<!-- row -->
					<div class="row mb-8">
						<div class="col-md-12">
							<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
								<!-- pageheader -->
								<div>
									<h2>Categories</h2>
								</div>
								<!-- button -->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12 col-12 mb-5">
							<!-- card -->
							<div class="card h-100 card-lg">
								<div class="px-6 py-6">
									<div class="row justify-content-between">
										<div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
										</div>
										<!-- select option -->
									</div>
								</div>
								<!-- card body -->
								<div class="card-body p-0">
									<!-- table -->
									<div class="table-responsive">
										<table class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
											<thead class="bg-light">
												<tr>
													<th>Name</th>
													<th>Proudct</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($data as $data)
												<tr>
													<td><a href="#" class="text-reset">{{$data->category_name}}</a></td>
													<td>12</td>
													<td>
														<div class="dropdown">
															<a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
																<i class="feather-icon icon-more-vertical fs-5"></i>
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="{{url('delete_category', $data->id)}}">
																		<i class="bi bi-trash me-3"></i>
																		Delete
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="{{url('edit_category', $data->id)}}">
																		<i class="bi bi-pencil-square me-3"></i>
																		Edit
																	</a>
																</li>
															</ul>
														</div>
													</td>
													@endforeach

												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="border-top d-flex justify-content-between align-items-md-center px-6 py-6 flex-md-row flex-column gap-4">
									<span>Showing 1 to 8 of 12 entries</span>
									<nav>
										<ul class="pagination mb-0">
											<li class="page-item disabled"><a class="page-link" href="#!">Previous</a></li>
											<li class="page-item"><a class="page-link active" href="#!">1</a></li>
											<li class="page-item"><a class="page-link" href="#!">2</a></li>
											<li class="page-item"><a class="page-link" href="#!">3</a></li>
											<li class="page-item"><a class="page-link" href="#!">Next</a></li>
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

<!-- Mirrored from freshcart.codescandy.com/dashboard/categories.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 06:09:16 GMT -->
</html>
