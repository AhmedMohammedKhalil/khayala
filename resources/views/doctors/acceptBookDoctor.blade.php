@extends('doctors.layout')
@section('section')
    <livewire:doctor.accept-book :booking_id="$booking->id"/>
@endsection
