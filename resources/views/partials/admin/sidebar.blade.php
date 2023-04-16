<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <i class="fas fa-list-alt"></i>
            <span>Category</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.tours.index') }}">
            <i class="fas fa-fw fa-plane"></i>
            <span>Tour</span></a>
    </li>

    {{-- <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.cars.index') }}">
            <i class="fas fa-fw fa-car"></i>
            <span>Car</span></a>
    </li> --}}

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.posts.index') }}">
            <i class="fas fa-fw fa-pen"></i>
            <span>Post</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a>
    </li>

    <!-- Divider -->

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.orders.index') }}">
            <i class="fas fa-fw fa-plane"></i>
            <span>Order</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.reviews.index') }}">
            <i class="fas fa-fw fa-pen"></i>
            <span>Review</span></a>
    </li>
    
    <hr class="sidebar-divider">

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('settings.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span></a>
    </li>

</ul>