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
            {!! $contact->details !!}
        </div>
        <div class="col-sm-5 about-txt margin-top"><img class="img-responsive" src="{{ asset( $contact->banner_path. $contact->banner) }}" alt="about" />
        </div>
    </div>
</section>
<!-- About Us End -->
<!-- Services Start -->
{{-- <section id="services" class="services">
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
</section> --}}
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
        @foreach ($galleris as $gallery)
            <div class="col-md-3 col-sm-6 co-xs-12 gal-item">
                <div class="box"> <a href="#" data-toggle="modal" data-target="#{{ $gallery->id }}"> <img
                            src="{{ asset($gallery->image_path.$gallery->image) }}" alt="Gallery Image"> </a>
                    <div class="modal fade" id="{{ $gallery->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <div class="modal-body"> <img src="{{ asset($gallery->image_path.$gallery->image) }}" alt="Gallery Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

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
                        <p>{{ $contact->address }}
                    </div>
                    <div class="col-sm-3"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                    </div>
                    <div class="col-sm-3"> <i class="fa fa-phone" aria-hidden="true"></i>
                        <h3>Mobile Number</h3>
                        <p>{{ $contact->mobile }}</p>
                    </div>
                    <div class="col-sm-3"> <i class="fa fa-volume-control-phone" aria-hidden="true"></i>

                        <h3>Phone Number</h3>
                        <p>{{ $contact->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="google-map">
        <iframe
            src="{{ $contact->map }}"
            allowfullscreen></iframe>
    </div>
</section>
<!-- Contact Us End -->
@endsection
