@extends('trainers.layout')
@push('css')
    <style>
        .login-form form .form-group .form-control {
            padding-left: 10px !important;
        }
    </style>
@endpush
@section('section')
    <livewire:trainer.product.edit :product_id="$product->id"/>
@endsection
