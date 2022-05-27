@extends('users.layout')
@section('section')
    <div style="margin: 80px 0">
        <div class="row">
            <div class="single-feedback">
                @if(Auth::guard('user')->user()->photo != null)
                    <img src="{{asset('img/users/'.auth('user')->user()->id.'/'.auth('user')->user()->photo)}}" alt="image">
                @else
                <img src="{{asset('img/users/default.jpg')}}" style="width: 200px !important; height: 200px" alt="image">
                @endif

                <div class="client-info pt-3">
                    <h3>{{ auth('user')->user()->name }}</h3>
                    <span>{{ auth('user')->user()->email }}</span>
                    <span>{{ auth('user')->user()->phone }}</span>
                </div>
                <p style="font-style: normal">{{ nl2br(auth('user')->user()->address) }}</p>
            </div>
        </div>
    </div>
@endsection
