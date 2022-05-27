@extends('trainers.layout')
@section('section')
<section class="cart-area pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <a href="{{ route('trainer.booking.add') }}" class="btn btn-primary">إضافة ميعاد</a>
            </div>
            <div class="col-lg-12 col-md-12">
                @include('common.bookTrainers')
            </div>
        </div>
    </div>
</section>
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
                console.log(info.event.id);
                id = info.event.id;
                info.jsEvent.preventDefault(); // don't let the browser navigate
                window.open("{{ route('trainer.booking.details') }}?id="+id,"_self");

            }
            });

            calendar.render();


        });

    </script>
@endpush
