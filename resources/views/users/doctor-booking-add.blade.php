@extends('layouts.app')
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area bg3 jarallax" data-jarallax='{"speed": 0.2}'>
        <div class="container">
            <div class="page-title-content">
                <h1>{{ $page_name }}</h1>
            </div>
        </div>
    </div>


    <div class=" pt-5 pb-5">
        <livewire:user.add-booking.doctor :doctor_id='$doctor_id'>
    </div>


@endsection
