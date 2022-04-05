@extends('layouts.app')
@section('content') 
    <!-- Start Main Banner -->
    <div class="main-banner item-bg1 jarallax" data-jarallax='{"speed": 0.2}'>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="main-banner-content">
                        <h1>Welcome to Khayala</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Banner -->

    <!-- Start About Area -->
    <section class="about-area ptb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="{{asset('img/about-img.jpg')}}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content">
                        <span>About Us</span>
                        <h2>We have 37 years of experience</h2>
                        <ul>
                            <li><i class="icofont-check-circled"></i> Year round night staff</li>
                            <li><i class="icofont-check-circled"></i> World-class farriery team</li>
                            <li><i class="icofont-check-circled"></i> Complete fostering service</li>
                            <li><i class="icofont-check-circled"></i> 24hr resident veterinary care</li>
                            <li><i class="icofont-check-circled"></i> Own fleet of equine transport</li>
                            <li><i class="icofont-check-circled"></i> Quarantine and isolation facilities</li>
                            <li><i class="icofont-check-circled"></i> Full time and stud season boarders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="horse-box1 wow fadeInLeft slow"><img src="{{asset('img/1.png')}}" alt="horse"></div>
    </section>
    <!-- End About Area -->


    @include('common.all')

@endsection