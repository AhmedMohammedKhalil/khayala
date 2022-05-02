@extends('layouts.app')
@section('content')
    <!-- Start Page Title Area -->
        <div class="page-title-area bg2 jarallax" data-jarallax='{"speed": 0.2}'>
            <div class="container">
                <div class="page-title-content">
                    <h1>جميع المسابقات</h1>
                </div>
            </div>
        </div>
    <!-- End Page Title Area -->
    <section class="stallions-area ptb-80" style="min-height:40vh">
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
                                    <h6>{{ $c->appointment }}</h6>
                                    <p class="line-clamp">{{ $c->address }}</p>
                                    <a href="{{ route('competitons.show',['id'=>$c->id]) }}" class="view-details">للمزيد<i class="icofont-simple-left"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @else
            <div>
                <h4 class="text-center">لا يوجد اى مسابقات الأن </h4>
            </div>
        @endif
        <div class="horse-box3 wow fadeInLeft slow"><img src="{{asset('img/2.png')}}" alt="horse"></div>
        <div class="horse-box4 wow fadeInLeft slow"><img src="{{asset('img/3.png')}}" alt="horse"></div>
    </section>

@endsection
