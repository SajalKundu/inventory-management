<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('backend/images/logo.png') }}" alt="EBL WEARABLE" class="img-responsive w-100">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @if(request()->is('home*')) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.customer.index') }}" class="nav-link @if(request()->is('admin/customer*')) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link @if(request()->is('admin/category*') || request()->is('admin/sub-category*')) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link @if(request()->is('admin/product*')) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
