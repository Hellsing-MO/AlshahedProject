<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-glass">
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div class="d-flex align-items-center">
            <a class="text-inherit d-block d-xl-none me-4" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-text-indent-right" viewBox="0 0 16 16">
                    <path
                        d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
                    />
                </svg>
            </a>
        </div>
        <div>
            <ul class="list-unstyled d-flex align-items-center mb-0 ms-5 ms-lg-0">
                <li class="dropdown ms-4">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/images/avatar/avatar-1.jpg" alt="" class="avatar avatar-md rounded-circle" />
                    </a>

                    <div class="dropdown-menu dropdown-menu-end p-0">
                        <div class="lh-1 px-5 py-4 border-bottom">
                            <h5 class="mb-1 h6">FreshCart Admin</h5>
                            <small>admindemo@email.com</small>
                        </div>

                        <ul class="list-unstyled px-2 py-3">
                            <li>
                                <a class="dropdown-item" href="#!">Home</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#!">Profile</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#!">Settings</a>
                            </li>
                        </ul>
                        <div class="border-top px-5 py-3" >
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" style="color: #222">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</nav>


        <div class="main-wrapper">
        <!-- navbar vertical -->
        <!-- navbar -->
<nav class="navbar-vertical-nav d-none d-xl-block">
<div class="navbar-vertical">
    <div class="px-4 py-5">
        <a href="{{ url('admin/dashboard')}}" class="navbar-brand">
            <img src="{{asset('images/logo alshahed.png')}}" style="width: 80px" alt="" />
            <span style="font-size: 20px">Alshahed</span>
        </a>
    </div>
    <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link  active " href="index.html">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                        <span class="nav-link-text">Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="nav-item mt-6 mb-3">
                <span class="nav-label">Store Managements</span>
            </li>
            <li class="nav-item">
                <a class="nav-link "  href="{{url('view_product')}}">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                        <span class="nav-link-text">Products</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('add_product')}}">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-shop"></i></span>
                        <span class="nav-link-text">Add new Product</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('view_category')}}">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                        <span class="nav-link-text">Categories</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link  collapsed "
                    href="#"
                    data-bs-toggle="collapse"
                    data-bs-target="#navCategoriesOrders"
                    aria-expanded="false"
                    aria-controls="navCategoriesOrders"
                >
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-bag"></i></span>
                        <span class="nav-link-text">Orders</span>
                    </div>
                </a>
                <div id="navCategoriesOrders" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="order-list.html">List</a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link " href="order-single.html">Single</a>
                        </li>
                    </ul>
                </div>
            </li>



        </ul>
    </div>
</div>
</nav>

<nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">
<div class="navbar-vertical">
    <div class="px-4 py-5 d-flex justify-content-between align-items-center">
        <a href="{{ url('admin/dashboard')}}" class="navbar-brand">
            <img src="{{asset('images/logo alshahed.png')}}" style="width: 80px" alt="" />
            <span style="font-size: 20px">Alshahed</span>
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
        <ul class="navbar-nav flex-column">
            <li class="nav-item">
                <a class="nav-link  active " href="index.html">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="nav-item mt-6 mb-3">
                <span class="nav-label">Store Managements</span>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="products.html">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                        <span class="nav-link-text">Products</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="categories.html">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                        <span class="nav-link-text">Categories</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navOrders" aria-expanded="false" aria-controls="navOrders">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-bag"></i></span>
                        <span class="nav-link-text">Orders</span>
                    </div>
                </a>
                <div id="navOrders" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="order-list.html">List</a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link " href="order-single.html">Single</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="vendor-grid.html">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><i class="bi bi-shop"></i></span>
                        <span class="nav-link-text">Sellers / Vendors</span>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>
</nav>
