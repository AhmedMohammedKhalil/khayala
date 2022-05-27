@extends('layouts.app')
@section('content')

    <div class="page-title-area bg3 jarallax" data-jarallax='{"speed": 0.2}'>
        <div class="container">
            <div class="page-title-content">
                <h1>{{ $page_name }}</h1>
            </div>
        </div>
    </div>
    @include('common.bookTrainerDetails')
@endsection
