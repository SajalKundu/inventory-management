<header>

    <div class="top-bar hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled list-inline">
                        <li>
                            <p><i class="fa fa-clock-o"></i> {{ $contact->about_company }}</p>
                        </li>
                        <li>
                            <p><i class="fa fa-phone"></i> Call us {{ $contact->mobile }}</p>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <div class="pull-right">
                        <ul class="social">
                            <li><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-google-plus"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-bar fadeInDown" data-spy="affix" data-offset-top="197">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-sm-2 hidden-xs"> <a href="index-2.html"><img src="{{ asset('frontend') }}/images/inventory-logo.png"
                            alt="inventory" /></a> </div>
                <!-- Navigation -->
                <div class="col-sm-10 col-xs-12 navigation">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span
                                    class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                    class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            <a class="navbar-brand" href="#home"><img src="{{ asset('frontend') }}/images/inventory.png"
                                    alt="White Dental Care" /></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#home">Home</a></li>
                                <li><a href="#aboutus">About Us</a></li>
                                {{-- <li><a href="#services">Services</a></li> --}}
                                <li><a href="#portfolio">Portfolio</a></li>
                                <li><a href="#contactus">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>
