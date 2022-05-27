@extends('layouts.app')
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area bg3 jarallax" data-jarallax='{"speed": 0.2}'>
        <div class="container">
            <div class="page-title-content">
                <h1>{{ $page_name }}</h1>
            </div>
        </div>
    </div>
<!-- End Page Title Area -->

<div class=" pt-5 pb-5">
    @include('common.bookTrainers')
</div>

@endsection

@push('js')
    <script>

        console.log(@json($bookings));
        document.addEventListener('DOMContentLoaded', function() {
            var initialLocaleCode = 'ar';
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            locale: initialLocaleCode,
            buttonIcons: true, // show the prev/next text
            weekNumbers: false,
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            dayMaxEvents: true, // allow "more" link when too many events
            events: @json($bookings),
            eventClick: function(info) {
                info.jsEvent.preventDefault(); // don't let the browser navigate
                window.open("{{ route('booking.trainer.details') }}?id="+info.event.id,"_self");
            }
            });

            calendar.render();


        });

    </script>
@endpush
