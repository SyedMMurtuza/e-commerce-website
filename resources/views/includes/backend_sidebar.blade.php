<head>
    @vite(['resources/sass/app.scss', 'resources/css/custom.css', 'resources/js/app.js'])
</head>

<aside class="side_bar">

    <ul class="side_bar_menu">
        <li>
            <a href="{{ route('admin') }}" class="{{ request()->routeIs('admin-index') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.shop') }}"
                class="{{ request()->routeIs('admin.shop', 'admin.shop.edit') ? 'active' : '' }}">
                <i class="fa-solid fa-briefcase"></i> Inventory Data
            </a>
        </li>
        <li>
            <a href="{{ route('admin.add') }}" class="{{ request()->routeIs('add') ? 'active' : '' }}">
                <i class="fa-solid fa-plus"></i> Add Product
            </a>
        </li>
        <li>
            <a href="{{ route('admin.orders.index') }}">
                <i class="fa-solid fa-receipt"></i> Orders
            </a>
        </li>

        {{-- <li>
        <a href="{{ route('admin.blogs') }}"
           class="{{ request()->routeIs('admin.blogs*') ? 'active' : '' }}">
            <i class="fa-solid fa-pen-nib"></i> Blogs
        </a>
    </li> --}}
        <li>
            <a href="{{ url('/') }}" target="_blank">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Website
            </a>
        </li>
    </ul>
    <div class="sidebar_footer">
        {{-- <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="nav-link btn btn-danger text-white mb-3 fs-5 border-0 w-100 text-start">
                <i class="fa-solid fa-right-from-bracket me-1"></i> LogOut
            </button>
        </form> --}}
        <p>© Webefy Today 2026, All rights reserved.</p>
    </div>
</aside>
