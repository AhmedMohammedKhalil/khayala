@extends('doctors.layout')
@section('section')
    <div style="margin: 80px 0">
        <div class="row">
            <div class="single-feedback">
                @if(Auth::guard('doctor')->user()->photo != null)
                    <img src="{{asset('img/doctors/'.auth('doctor')->user()->id.'/'.auth('doctor')->user()->photo)}}" alt="image">
                @else
                <img src="{{asset('img/doctors/default.jpg')}}" style="width: 200px !important; height: 200px" alt="image">
                @endif

                <div class="client-info pt-3">
                    <h3>{{ auth('doctor')->user()->name }}</h3>
                    <span>{{ auth('doctor')->user()->specialization }}</span>
                    <span>{{ auth('doctor')->user()->email }}</span>
                    <span>{{ auth('doctor')->user()->phone }}</span>

                </div>
                <p style="font-style: normal">{!! nl2br(auth('doctor')->user()->description) !!}</p>
                <p style="font-style: normal">{!! nl2br(auth('doctor')->user()->address) !!}</p>
            </div>
        </div>
    </div>
@endsection
