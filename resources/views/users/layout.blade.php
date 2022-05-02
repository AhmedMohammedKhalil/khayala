@extends('layouts.app')
@section('content')
        <!-- Start Page Title Area -->
        <div class="page-title-area bg2 jarallax" data-jarallax='{"speed": 0.2}'>
            <div class="container">
                <div class="page-title-content">
                    <h1>{{ $page_name }}</h1>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Courses Details Area -->
        <section class="courses-details-area" style="padding: 40px 0">
            <div class="container">
                <div class="row">
                    @include('users.menu')
                    <div class="col-lg-9 col-md-12" >
                        @yield('section')
                    </div>
                </div>
            </div>
        </section>
        <!-- End Courses Details Area -->
@endsection
