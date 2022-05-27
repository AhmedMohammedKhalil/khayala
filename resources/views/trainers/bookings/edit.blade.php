@extends('trainers.layout')
@section('section')
    <livewire:trainer.booking.edit-booking :booking_id="$booking->id"/>
@endsection
