@extends('doctors.layout')
@section('section')
    <livewire:doctor.booking.edit-booking :booking_id="$booking->id" />
@endsection
