@extends('admins.layout')
@section('section')
    <div style="margin: 80px 0">
        <div class="row">
            <div class="single-feedback col-4 offset-4">
                @if(Auth::guard('admin')->user()->photo != null)
                    <img src="{{asset('img/admins/'.auth('admin')->user()->id.'/'.auth('admin')->user()->photo)}}" alt="image">
                @else
                <img src="{{asset('img/admins/default.jpg')}}" style="width: 200px !important; height: 200px" alt="image">
                @endif 
    
                <div class="client-info pt-3">
                    <h3>{{ auth('admin')->user()->name }}</h3>
                    <span>{{ auth('admin')->user()->email }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection