<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.meta')
    @include('admin.include.css')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.include.header')

        @include('admin.include.sidebar')

        @yield('content')

        @include('admin.include.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    @include('admin.include.js')
</body>
</html>
