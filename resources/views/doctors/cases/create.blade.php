@extends('doctors.layout')
@push('css')
    <style>
        .login-form form .form-group .form-control {
            padding-left: 10px !important;
        }
    </style>
@endpush
@section('section')
    <livewire:doctor.case.create />
@endsection
