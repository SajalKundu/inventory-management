@extends('frontend.layouts.master')
@section('title')
Inventory Management System
@endsection
@section('content')
 <!-- Banner Wraper Start -->
 <div class="banner-wrapper">
    <div id="myCarousel" class="carousel fade-carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach ($homeSliders as $item)
            <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            @foreach ($homeSliders as $item)
            <div class="item slides {{ $loop->index == 0 ? 'active' : '' }}">
                <div class="slide-4" style="background-image: url('{{ asset($item->image_path.$item->image) }}');">

                </div>
                {{-- <div class="carousel-text">
                    <h1 class="animated1">White Dental Care</h1>
                    <h3 class="animated2">Multipurpose Responsive Template</h3>
                    <button class="btn btn-carousel btn-lg animated3">About Us</button>
                </div> --}}
            </div>
            @endforeach







        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span
                class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span
                class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel"
            role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"
                aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>
</div>
<!-- Banner Wraper End -->
<!-- About Us Start -->

<section id="aboutus" class="aboutus">
    <div class="container">
        <div class="col-sm-7 about-txt">
            <h2>About Us</h2>
            <p>Magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna
                aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna
                aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna
                aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
            <p>Magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna
                aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Magna
                aliqua ut enim ad minim veniam.</p>
        </div>
        <div class="col-sm-5 about-txt"><img src="{{ asset('frontend') }}/images/doctor-img4.jpg" alt="about" />
        </div>
    </div>
</section>
<!-- About Us End -->
<!-- Services Start -->
<section id="services" class="services">
    <div class="container">
        <div class="title">
            <h2>Our <span>Services</span></h2>
            <span class="title-border-blue"><i class="fa fa-plus-square"></i></span>
        </div>
        <div class="service-callouts">
            <div class="col-sm-6 col-md-4"><span class="shadow"><img src="{{ asset('frontend') }}/images/icon1.png"
                        alt="icon"></span>
                <h2>Dental Cleaning</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit</p>
            </div>
            <div class="col-sm-6 col-md-4"><span class="shadow"><img src="{{ asset('frontend') }}/images/icon2.png"
                        alt="icon"></span>
                <h2>COSMETIC DENTISTRY</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit</p>
            </div>
            <div class="col-sm-6 col-md-4"><span class="shadow"><img src="{{ asset('frontend') }}/images/icon3.png"
                        alt="icon"></span>
                <h2>Oral Exam</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit</p>
            </div>

        </div>
    </div>
</section>
<!-- Services End -->
<!-- Our counters -->
<div class="counters">
    <div class="col-sm-3 counter"> <i class="fa fa-list-alt" aria-hidden="true"></i>
        <div class="number animateNumber" data-num="28"> <span>28</span></div>
        <p>Our Shop</p>
    </div>
    <div class="col-sm-3 counter"> <i class="fa fa-user" aria-hidden="true"></i>
        <div class="number animateNumber" data-num="180"> <span>180</span></div>
        <p>Our staff</p>
    </div>
    <div class="col-sm-3 counter"> <i class="fa fa-smile-o" aria-hidden="true"></i>
        <div class="number animateNumber" data-num="3600"> <span>3600</span></div>
        <p>Happy Clients</p>
    </div>
    <div class="col-sm-3 counter"> <i class="fa fa-desktop" aria-hidden="true"></i>
        <div class="number animateNumber" data-num="18"> <span>18</span></div>
        <p>Our Awards</p>
    </div>
</div>

<!-- Portfolio Start -->
<section id="portfolio" class="portfolio">
    <div class="title">
        <h2>Our <span>Portfolio</span></h2>
        <span class="title-border-blue"><i class="fa fa-plus-square"></i></span>
    </div>
    <div class="gal-container">
        <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
            <div class="box"> <a href="#" data-toggle="modal" data-target="#1"> <img
                        src="{{ asset('frontend') }}/images/gallery-img1.jpg" alt="Gallery Image"> </a>
                <div class="modal fade" id="1" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <div class="modal-body"> <img src="{{ asset('frontend') }}/images/gallery-img1.jpg" alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
            <div class="box"> <a href="#" data-toggle="modal" data-target="#2"> <img
                        src="{{ asset('frontend') }}/images/gallery-img2.jpg" alt="Gallery Image"> </a>
                <div class="modal fade" id="2" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <div class="modal-body"> <img src="{{ asset('frontend') }}/images/gallery-img2.jpg" alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
            <div class="box"> <a href="#" data-toggle="modal" data-target="#3"> <img
                        src="{{ asset('frontend') }}/images/gallery-img3.jpg" alt="Gallery Image"> </a>
                <div class="modal fade" id="3" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <div class="modal-body"> <img src="{{ asset('frontend') }}/images/gallery-img3.jpg" alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
            <div class="box"> <a href="#" data-toggle="modal" data-target="#4"> <img
                        src="{{ asset('frontend') }}/images/gallery-img4.jpg" alt="Gallery Image"> </a>
                <div class="modal fade" id="4" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <div class="modal-body"> <img src="{{ asset('frontend') }}/images/gallery-img4.jpg" alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
            <div class="box"> <a href="#" data-toggle="modal" data-target="#5"> <img
                        src="{{ asset('frontend') }}/images/gallery-img5.jpg" alt="Gallery Image"> </a>
                <div class="modal fade" id="5" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <div class="modal-body"> <img src="{{ asset('frontend') }}/images/gallery-img5.jpg" alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
            <div class="box"> <a href="#" data-toggle="modal" data-target="#6"> <img
                        src="{{ asset('frontend') }}/images/gallery-img6.jpg" alt="Gallery Image"> </a>
                <div class="modal fade" id="6" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <div class="modal-body"> <img src="{{ asset('frontend') }}/images/gallery-img6.jpg" alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
            <div class="box"> <a href="#" data-toggle="modal" data-target="#7"> <img
                        src="{{ asset('frontend') }}/images/gallery-img7.jpg" alt="Gallery Image"> </a>
                <div class="modal fade" id="7" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <div class="modal-body"> <img src="{{ asset('frontend') }}/images/gallery-img7.jpg" alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
            <div class="box"> <a href="#" data-toggle="modal" data-target="#8"> <img
                        src="{{ asset('frontend') }}/images/gallery-img8.jpg" alt="Gallery Image"> </a>
                <div class="modal fade" id="8" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <div class="modal-body"> <img src="{{ asset('frontend') }}/images/gallery-img8.jpg" alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio End -->

<!-- Appointment Start -->
{{-- <section class="appointment">
    <div class="container">
        <div class="title">
            <h2>Book An Appointment</h2>
            <span class="title-border-blue"><i class="fa fa-plus-square"></i></span>
        </div>
        <form>
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    <input type="text" placeholder="Name" name="name" required
                        class="form-control form-item">
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    <input type="text" placeholder="Phone" name="phone" required
                        class="form-control form-item">
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="form-group">
                    <input type="text" placeholder="Email" name="email" required
                        class="form-control form-item">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <textarea placeholder="Message" name="Message" rows="3" class="form-control form-item"></textarea>
                </div>
            </div>
            <div class="col-xs-12 text-center"> <button class="btn btn-1" type="submit">Submit</button></div>
        </form>
    </div>
</section> --}}
<!-- Appointment End -->
<!-- Contact Us Start -->
<section id="contactus" class="contactus">
    <div class="container">
        <div class="title">
            <h2>Contact <span>Us</span></h2>
            <span class="title-border-blue"><i class="fa fa-plus-square"></i></span>
        </div>
        <div class="contact-inner">
            <div class="col-sm-12">
                <div class="contact-details">
                    <div class="col-sm-3"> <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h3>Address</h3>
                        <p>300 E-Block Building, USA</p>
                    </div>
                    <div class="col-sm-3"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h3>Eamil</h3>
                        <p><a href="mailto:support@yourdomain.com">support@yourdomain.com</a></p>
                    </div>
                    <div class="col-sm-3"> <i class="fa fa-phone" aria-hidden="true"></i>
                        <h3>Contact Number</h3>
                        <p>0800 123 46 0000</p>
                    </div>
                    <div class="col-sm-3"> <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <h3>Customer Care</h3>
                        <p>0800 123 46 7890</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="google-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d198710.35112897935!2d-98.51489117772236!3d38.904562823631146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1471865832140"
            allowfullscreen></iframe>
    </div>
</section>
<!-- Contact Us End -->
@endsection
