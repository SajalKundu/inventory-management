<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center">
        <img src="{{ asset('backend/images/inventory-logo.png') }}" alt="Inventory" class="img-responsive " width="50">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @if (request()->is('admin/slider*')) active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p> Home</p><i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview" >
                        <li class="nav-item">
                            <a href="{{ route('a_slider.index') }}" class="nav-link  @if (request()->is('admin/slider*')) active @endif">
                                <i class="far fa-image nav-icon"></i>
                                <p>Home Slider</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('a_gallery.index') }}" class="nav-link  @if (request()->is('admin/gallery*')) active @endif">
                                <i class="far fa-image nav-icon"></i>
                                <p>Portfolio Gallery</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.customer.index') }}"
                        class="nav-link @if (request()->is('admin/customer*')) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}"
                        class="nav-link @if (request()->is('admin/category*') || request()->is('admin/sub-category*')) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('creditors.index') }}"
                        class="nav-link @if (request()->is('admin/creditors*')) active @endif">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                            Creditors
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('debtors.index') }}"
                        class="nav-link @if (request()->is('admin/debtors*')) active @endif">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                            Debtors
                        </p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link @if(request()->is('admin/product*')) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Stocks
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.sale.index') }}" class="nav-link @if(request()->is('admin/sale*')) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sales
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.report.sale.index') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Sale Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.report.creditor.index') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Creditor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.report.debtor.index') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Debtors</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link @if (request()->is('admin/contacts*')) active @endif">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p> Contact</p><i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview" >


                        <li class="nav-item">
                            <a href="{{ route('contacts.contact-us.index') }}" class="nav-link  @if (request()->is('admin/contacts/contact-us*')) active @endif">
                                <i class="far fa-address-card nav-icon"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contacts.company-details.index') }}" class="nav-link  @if (request()->is('admin/contacts/company-details*')) active @endif">
                                <i class="far fa-address-card nav-icon"></i>
                                <p>Company with Invoice</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
