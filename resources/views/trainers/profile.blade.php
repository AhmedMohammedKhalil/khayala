@extends('trainers.layout')
@section('section')
    <div style="margin: 80px 0">
        <div class="row">
            <div class="single-feedback">
                @if(Auth::guard('trainer')->user()->photo != null)
                    <img src="{{asset('img/trainers/'.auth('trainer')->user()->id.'/'.auth('trainer')->user()->photo)}}" alt="image">
                @else
                <img src="{{asset('img/trainers/default.jpg')}}" style="width: 200px !important; height: 200px" alt="image">
                @endif

                <div class="client-info pt-3">
                    <h3>{{ auth('trainer')->user()->name }}</h3>
                    <span>{{ auth('trainer')->user()->specialization }}</span>
                    <span>{{ auth('trainer')->user()->email }}</span>
                    <span>{{ auth('trainer')->user()->phone }}</span>

                </div>
                <p style="font-style: normal">{{ nl2br(auth('trainer')->user()->description) }}</p>
                <p style="font-style: normal">{{ nl2br(auth('trainer')->user()->address) }}</p>
            </div>
        </div>
    </div>
@endsection
