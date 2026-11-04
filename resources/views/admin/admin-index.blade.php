@extends('layout.backend')

@section('content')
    <section class="dash py-4">
        <div class="container">

            <div class="dash-hero p-4 p-md-5 rounded-4 shadow mb-4">
                <p class="mb-1 opacity-75">Welcome 👋</p>
                <h2 class="fw-bold mb-2">{{ Auth::user()->name }}</h2>
                <p class="mb-0 opacity-75">Mange Your Products</p>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="dash-card d-flex align-items-center gap-3 p-4 rounded-4 shadow-sm bg-cyan">
                        <div class="dash-icon bg-purple-soft"><i class="fa-solid fa-briefcase"></i></div>
                        <div>
                            <small class="text-white fs-6 fw-semibold">Product</small>
                            <h3 class="mb-0 fw-bold fs-1">{{ $ShopCount }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash-card d-flex align-items-center gap-3 p-4 rounded-4 shadow-sm bg-lghtblue">
                        <div class="dash-icon bg-pink-soft"><i class="fa-solid fa-users"></i></div>
                        <div>
                            <small class="text-white fs-6 fw-semibold">Customers</small>
                            <h3 class="mb-0 fw-bold fs-1">10</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash-card d-flex align-items-center gap-3 p-4 rounded-4 shadow-sm bg-blue">
                        <div class="dash-icon bg-pink-soft"><i class="fa-regular fa-comments"></i></i></div>
                        <div>
                            <small class="text-white fs-6 fw-semibold">Reviews</small>
                            <h3 class="mb-0 fw-bold fs-1">28</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash-card d-flex align-items-center gap-3 p-4 rounded-4 shadow-sm">
                        <div class="dash-icon bg-pink-soft"><i class="fa-solid fa-pen-nib"></i></div>
                        <div>
                            <small class="text-white fs-6 fw-semibold">Orders</small>
                            <h3 class="mb-0 fw-bold fs-1">{{ $orderCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="fw-semibold mb-3">Quick Actions</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <a href="{{ route('admin.add') }}"
                        class="dash-action rounded-4 p-4 d-block text-decoration-none shadow-sm bg-white">
                        <i class="fa-solid fa-plus mb-2"></i>
                        <h6 class="mb-0">Add Product</h6>
                    </a>
                </div>
                {{-- <div class="col-md-4">
                <a href="{{ route('admin.blogs.add') }}" class="dash-action rounded-4 p-4 d-block text-decoration-none shadow-sm bg-white">
                    <i class="fa-solid fa-file-circle-plus mb-2"></i>
                    <h6 class="mb-0">Add Blog</h6>
                </a>
            </div> --}}
                <div class="col-md-4">
                    <a href="/" target="_blank"
                        class="dash-action rounded-4 p-4 d-block text-decoration-none shadow-sm bg-white">
                        <i class="fa-solid fa-arrow-up-right-from-square mb-2"></i>
                        <h6 class="mb-0">View Website</h6>
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection
