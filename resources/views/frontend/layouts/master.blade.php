<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        @yield('title')
    </title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend') }}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link href="{{ asset('frontend') }}/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="{{ asset('frontend') }}/assets/animate/animate.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}images/favicon.ico">

</head>

<body id="home">
    <!-- Pre Loader -->
    <div id="loader"></div>
    <!-- Header -->
    @include('frontend.layouts.header')
    @yield('content')
    <!-- Copy Rights Start -->
    <footer>
        <div class="container">
            <p>&copy; Copyright
                <script type="text/javascript">
                    var d = new Date();
                    document.write(d.getFullYear());
                </script>
                <a href="#">Inventory</a> All Rights Reserved. Designed by <a href="#">Team
                    Inventory</a>
            </p>
        </div>
        <a id="scrool-top" href="#"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
    </footer>
    <!-- Copy Rights End -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('frontend') }}/assets/js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('frontend') }}/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/easing/jquery.easing.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/wow/wow.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/number-animation/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('frontend') }}/js/custom.js"></script>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="{{ asset('frontend') }}/https://www.googletagmanager.com/gtag/js?id=UA-83282272-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments)
        };
        gtag('js', new Date());

        gtag('config', 'UA-83282272-3');
    </script>
</body>

</html>
