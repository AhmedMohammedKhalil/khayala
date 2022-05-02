@extends('admins.layout')
@push('css')
    <style>
        .login-form form .form-group .form-control {
            padding-left: 10px !important;
        }
    </style>
@endpush
@section('section')
    <livewire:admin.competition.edit :comp_id="$competition->id"/>
@endsection
