@extends('layouts.app')
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area bg2 jarallax" data-jarallax='{"speed": 0.2}'>
        <div class="container">
            <div class="page-title-content">
                <h1>Our Competitions</h1>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <!-- Start Stallions Area -->
    <section class="stallions-area ptb-80">
        @if(count($competitions) > 0)
            <div class="container">
                <div class="row">
                    @foreach ($competitions as $c)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-stallions">
                                @if($c->photo != null)
                                <img src="{{asset('img/competitions/'.$c->id.'/'.$c->photo)}}" alt="image">
                                @else
                                    <img src="{{asset('img/competitions/default.jpg')}}" alt="image">
                                @endif
                                <div class="stallions-content">
                                    <h3>{{ $c->name }}</h3>
                                    <h4>{{ $c->organization }}</h4>
                                    <p>{{ $c->address }}</p>
                                    <p>{{ $c->description }}</p>
                                    <a href="#" class="view-details">View Details <i class="icofont-simple-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        @else
            <div>
                <p>Not Found</p>
            </div>
        @endif
        <div class="horse-box3 wow fadeInLeft slow"><img src="{{asset('img/2.png')}}" alt="horse"></div>
        <div class="horse-box4 wow fadeInLeft slow"><img src="{{asset('img/3.png')}}" alt="horse"></div>
    </section>
    <!-- End Stallions Area -->
@endsection