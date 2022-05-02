@extends('trainers.layout')
@section('section')
    <livewire:trainer.accept-book :booking_id="$booking->id"/>
@endsection
